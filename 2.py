string = ['D','U','M','B','W','A','Y','S','I','D']

max = len(string)-1


for i in range(len(string)):
    for j in range(len(string)):
        if i == j or i+j == max:
            print(string[i], end='')
        else:
            print('=',end='')
    print('')
        

