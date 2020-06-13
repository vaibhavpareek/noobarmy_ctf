#use this script if you want to great more than 4000 links in worlist, i have created chall for 4000.

ch=["a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z"]
pro = ["cpp","python","js","css","php"]
import random
fp = open("wordlist.txt","w+")
for i in range(0,3000):
	re =""
	j = random.randint(4,10)
	for k in range(0,j):
		rno = random.randint(0,len(ch)-1)
		re += ch[rno]
	pr = random.randint(0,len(pro)-1)
	fp.write("<a href='/"+re+"."+str(pro[pr])+"' >"+str(pro[pr])+"</a>\n")	
fp.close()
