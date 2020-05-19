#!/usr/bin/env bash

set -e

if [ $# -lt 1 ]; then
	echo "usage: $0 <version>"
	exit 1
fi

version=$1

if [ ! `echo $version | grep -e 'alpha' -e 'beta' -e 'RC' -e 'rc'` ] ; then
  sed -i.bak -e "s/^Stable tag: .*/Stable tag: ${version}/g" readme.txt;
fi
rm readme.txt.bak

sed -i.bak  -e "s/^ \* Version: .*/ * Version: ${version}/g" snippet-injection.php;
sed -i.bak  -e "s/^ \* @version .*/ * @version ${version}/g" snippet-injection.php;

rm snippet-injection.php.bak

rsync -a --exclude-from=.distignore ./ ./distribution/
cd distribution
zip -r ../snippet-injection.zip ./
cd ../
rm -rf distribution
