#!/usr/bin/env python
import urllib
import json as m_json

query = raw_input ( 'Query: ' )
query = urllib.urlencode ( { 'q' : query } )
# rz=8 is the max (1-8) that I can return with this API: https://developers.google.com/image-search/v1/jsondevguide?csw=1#basic_query

for i = 1; i < 100; i+8:
	response = urllib.urlopen ( 'http://ajax.googleapis.com/ajax/services/search/web?v=1.0&rsz=large&start=0&' + query).read()
	json = m_json.loads ( response )
	results = json [ 'responseData' ] [ 'results' ]

	for result in results:
	    title = result['title']
	#     # url = result['url']   # was URL in the original and that threw a name error exception
	#     # print ( title + '; ' + url )
	    print ( title )

i+=8	    