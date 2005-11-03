#!/bin/sh
mkdir thumbs
rm thumbs/*
cp *.png thumbs/
for i in thumbs/*; do mogrify $i -format jpeg -quality 50 -resize 320x240 $i; done
for i in *.png; do rm thumbs/$i; done
