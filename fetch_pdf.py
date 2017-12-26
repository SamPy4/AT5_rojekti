import requests
from lxml import html

def fetch():
    url = open("url.txt", "r+")
    urlcont = url.read()
    pdflink = []
    uselessUrl = "/instancedata/prime_product_julkaisu/vantaa/embeds/vanttiwwwstructure/"
    try:
        page = requests.get('http://www.vantti.fi/ruokalistat/101/0/koulut')
    except requests.exceptions.ConnectionError:
        print("Fetcher couldn't fetch: No internet connection")
        print("PDF might be out-of-date")
        return

    tree = html.fromstring(page.content)
    pdflink = tree.xpath("/html/body/form/div[3]/div/div[2]/div/div[1]/div/div[1]/p[2]/span//a/@href")

    if urlcont.strip() != pdflink[0].strip():
        print("PDF is out-of-date")
        old_name = pdflink[0].replace(uselessUrl, "")
        new_name = urlcont.replace(uselessUrl, "")
        print("Old name:", old_name)
        print("New name:", new_name)

    else:
        print("PDF is up-to-date")
        return

if __name__ == "__main__":
    fetch()
