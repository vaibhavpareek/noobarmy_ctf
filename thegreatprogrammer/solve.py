from bs4 import BeautifulSoup
import subprocess
link= input("Enter link :  ")
try:
	data = requests.get(link).text
	soup = BeautifulSoup(data,'html.parser')
	all_anchors=soup.find_all('a')
	count=1
	for anchor in all_anchors:
		href = link+anchor['href']
		print(str(count))
		status = subprocess.check_output("curl -s -o /dev/null -w '%{http_code}' "+str(href), shell=True);
		status = str(status.decode())
		if(status==str(200)):
			print("\033[1;33;48m"+ "[FOUND] : "+href)
			exit()
		else:
			print("\033[1;35;48m"+" [NOT FOUND] : "+href)
		count+=1
except Exception as e:
	print(e)
	print("Might be issue with the links (Try Again)")
