#!/bin/sh
if [ ! -d thumbs ]; then
	mkdir thumbs
fi
for i in *.png; do 
	if [ ! -f thumbs/`basename $i .png`.jpeg ]; then
		cp $i thumbs/$i
		mogrify thumbs/$i -format jpeg -quality 50 -resize 320x240 thumbs/$i
		rm thumbs/$i
	fi
done
