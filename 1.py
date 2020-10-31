kata = input("Masukkan kalimat: ")

def urutKata(kata):

    x = kata.split()
    res = [int(i) for i in kata if i.isdigit()]
    res.sort()
    listNya = []
    for i in res:
        for j in range(len(x)):
            if str(i) in x[j]:
                listNya.append(x[j])
    
    print(listNya)
        
            
urutKata(kata)