#from MySQLdb import _mysql as mysql
import _mysql as mysql
from datetime import datetime
import sivu_class
mysql.debug("1")

parsin = []
for i in range(7):
    parsin.append(sivu_class.sivu(i))
#          y- m- d
pvm_now = "{}-{}-{}".format(datetime.now().year, datetime.now().month, datetime.now().day)

print(parsin[0].getAll())

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
    return sana

weekday = datetime.now().weekday()



exit()

link = mysql.connect("localhost", "root", "root", "projekti_tyo")
pvm      = pvm_now
ruoka    = parsin[0].getPaivatList()[weekday]
r_arv    = 0
kasRuoka = "Kasvisbolognese"
k_arv    = 0

insert = """INSERT INTO ruoka (`pvm`, `ruoka`, `arvostelu ruoka`, `kasvisruoka`, `arvostelu kasvisruoka`) VALUES ('{}','{}','{}','{}','{}')""".format(
                                                                                                                   pvm, ruoka, r_arv, kasRuoka, k_arv)
query  = """SELECT * FROM ruoka WHERE pvm='{}'""".format(pvm_now)
delete = """DELETE FROM ruoka WHERE pvm='{}'""".format(pvm)
#link.query(insert)

# result = link.store_result()
# row = result.fetch_row()[0]

print(row[1])
print(parsi(str(row[1])))

link.close()
print("Done")
