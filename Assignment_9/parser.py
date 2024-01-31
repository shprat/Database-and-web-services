import csv
import re

#access log and error log must be in the directory as this script

#access log
def parser_access_log(filename, pagename, pagepath, day):
    with open('./data/' + filename) as f, open('./data/' + pagename + '.csv','w') as csvf, open('./data/' + 'counter.csv','a+') as co:
        log = f.read()
        #\[(\d{2}\/[A-Za-z]{3}\/\d{4}\:\d{2}\:\d{2}\:\d{2}).*\]
        #using regexp to parse our accessfile
        regexp = r'([(\d\.)]+) - - \[(' + day + r'\/[A-Za-z]{3}\/\d{4}\:\d{2}\:\d{2}\:\d{2}).*?\] "(GET ' + pagepath + \
            r'.*?)" (200) (\d+) "(.*?)" ".*(\b\w+)\/.*"'
        lists = re.findall(regexp,log)
        #creating csv object file
        writer = csv.writer(csvf)
        writer2 = csv.writer(co)
        
        header = ['IP','Time','Browser']
        writer.writerow(header)
        i=0

        #writing each tuple in list to each page's csv file
        for item in lists:
            writer.writerow( (item[0],item[1],item[6]) )
            i = i+1 #counter for counting how many times the page was accessed

        writer2.writerow((pagename,i))
        f.close()
        csvf.close()
        co.close()

#error log 
def parser_error_log(filename):
    with open('./data/' + filename) as f, open('./data/' + 'error.csv','w') as csvf:
        log = f.read()
        regexp = r'\[([A-Za-z]{3} [A-Za-z]{3} \d{2} \d{2}:\d{2}:\d{2}).*(\d{4})\] \[(.*?)\] \[(.*?)\] \[client(.*?)\] [A-Z]{3} [A-Za-z]{6}: (.*?)\bin\b(.*(/~prshah).*)'
        lists = re.findall(regexp,log)
        #creating csv object file
        writer = csv.writer(csvf)
        header = ['Time', 'Error', 'Client']
        writer.writerow(header)
        error1= 'Error #1'
        error2 = 'Error #2'

        #writing in csv file 
        for item in lists:
            if item[5] == ' Trying to access array offset on value of type null ' : #since we only have this error, would be easier to do it this way
                writer.writerow((item[0]+' '+item[1], error1, item[4]))
            else :
                writer.writerow((item[0]+' '+item[1], error2, item[3]))

        f.close()
        csvf.close()

if __name__ == '__main__':
    dict_of_pages = {
        'index': '/~prshah',
        'login': '/~prshah/login.html',
        'maintenance': '/~prshah/maintenance.php',
        }
    day='17' #Nov 11 as last thrusday was most traffic
    for key, value in dict_of_pages.items(): #loop through dict
        parser_access_log('access_log', key, value, day) # access csv
    parser_error_log('error_log') #error csv