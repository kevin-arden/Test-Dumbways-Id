dataKey = input('Masukkan data key: ')
word = input('Masukkan word: ')

def check(dataKey,word):
    for i in range(len(dataKey)):
        if dataKey[i] in word:
            print(dataKey[i],' => True')
        else:
            print(dataKey[i],' => False')

check(dataKey,word)