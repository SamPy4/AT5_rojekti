#from MySQLdb import _mysql as mysql
import _mysql as mysql
from datetime import datetime
import sivu_class, calendar
mysql.debug("1")

parsin = []
for i in range(7):
    parsin.append(sivu_class.sivu(i))
#          y- m- d
pvm_now = "{}-{}-{}".format(datetime.now().year, datetime.now().month, datetime.now().day)
year    = datetime.now().year
month   = datetime.now().month
weekday = datetime.now().weekday()


#print(parsin[0].getAll())

#print(pvm_now)

#print("\n", datetime.now().weekday())

#print(parsin[0].getPaivatList()[4])

def parsi(sana):
    str(sana)
    sana=sana.replace("b", "")
    sana=sana.replace("[", "")
    sana=sana.replace("]", "")
    sana=sana.replace('"', "")
    sana=sana.replace("'", "")

    sana = sana.replace("\\xe4", "ä")
    sana = sana.replace("\\xc3", "ä")
    sana = sana.replace("\\xf6", "ö")
    sana = sana.replace("\\xe5", "å")
    sana = sana.replace("\\n", "\n")

    try:
        sana = sana.replace("---MA", "")
    except:
        pass
    try:
        sana = sana.replace("---TI", "")
    except:
        pass
    try:
        sana = sana.replace("---KE", "")
    except:
        pass
    try:
        sana = sana.replace("---TO", "")
    except:
        pass
    try:
        sana = sana.replace("---PE", "")
    except:
        pass
    try:
        sana = sana.replace("---LA", "")
    except:
        pass

    try:
        peTextInd  = sana.index("Tarjolla")
        sana = sana.replace(sana[peTextInd:], "")
    except:
        pass
    return sana

ruokajadates = []
x = 0

while x <= len(parsin)-1:
    paivatList  = parsin[x].getPaivatList()
    sivunPaivat = parsin[x].getSivunPaivat()

    if sivunPaivat[-1] == False:
        vMonth = sivunPaivat[2]
    elif sivunPaivat[-1] == True:
        vMonth = sivunPaivat[1]

    #print(sivunPaivat)
    vDay = sivunPaivat[0]

    if vMonth == 12 and vDay >= 30:
        vYear = year+1
    else:
        vYear = year

    if len(str(vDay)) == 1:
        vDay = "0" + str(vDay)
    if len(str(vMonth)) == 1:
        vMonth = "0" + str(vMonth)

    fullDateStr = "{}-{}-{}".format(vYear, vMonth, vDay)

    cal     = calendar.Calendar()
    Days    = cal.itermonthdates(int(vYear), int(vMonth))

    allDays = []
    for day in Days:
        allDays.append(day)


    # Days2   = cal.itermonthdates(2018, 1)
    # for day in Days2:
    #     allDays.append(day)

    # print(allDays)
    # print("vYear, vMonth", vYear, vMonth)

    dates = []

    found = False
    i = 0
    for day in allDays:
        if str(day) == fullDateStr or found == True:
            found = True
            if i >= 6:
                break
            dates.append(str(day))
            i += 1


    for i in range(5):
        try:
            ruokajadates.append((dates[i], paivatList[i]))
        except IndexError:
            break

    print(x, "OK")
    x += 1

    # for i in ruokajadates:
    #     print(i[0])

# print(x)
# print()
# print(ruokajadates[20])


link = mysql.connect("localhost", "root", "root", "projekti_tyo")
pvm      = pvm_now
#ruoka    = parsin[0].getPaivatList()[weekday]
r_arv    = 0
kasRuoka = "Kasvisbolognese"
k_arv    = 0

query  = """SELECT * FROM ruoka WHERE pvm='{}'""".format(pvm_now)

for i in ruokajadates:
    delete = """DELETE FROM ruoka WHERE pvm='{}'""".format(i[0])
    insert = """INSERT INTO ruoka (`pvm`, `ruoka`, `arvostelu ruoka`, `kasvisruoka`, `arvostelu kasvisruoka`) VALUES ('{}','{}','{}','{}','{}')""".format(
                                                                                                                       i[0], parsi(i[1]), r_arv, kasRuoka, k_arv)
    link.query(insert)

#result = link.store_result()
#row = result.fetch_row()[0]

# print(row[1])
# print(parsi(str(row[1])))

link.close()
print("Done")
