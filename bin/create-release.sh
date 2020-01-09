#!/usr/bin/env bash

set -e

if [ $# -lt 1 ]; then
	echo "usage: $0 <version>"
	exit 1
fi

version=$1

sed -i '' -e "s/^ \* Version: .*/ * Version: ${version}/g" snippet-injection.php;
sed -i '' -e "s/^ \* @version .*/ * @version ${version}/g" snippet-injection.php;

rsync -a --exclude-from=.distignore ./ ./distribution/
cd distribution
zip -r ../snippet-injection.zip ./
cd ../
rm -rf distribution
