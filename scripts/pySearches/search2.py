import urllib2
import json as simplejson

# The request also includes the userip parameter which provides the end
# user's IP address. Doing so will help distinguish this legitimate
# server-side traffic from traffic which doesn't come from an end-user.
url = ('https://ajax.googleapis.com/ajax/services/search/web'
       '?v=1.0&q=Daniel%20Davies&userip=USERS-IP-ADDRESS&rsz=large&start=0')

request = urllib2.Request(
    url, None)
response = urllib2.urlopen(request)

# Process the JSON string.
results = simplejson.load(response)
# now have some fun with the results..

with open('data.json', 'w') as outfile:
    simplejson.dump(results, outfile)