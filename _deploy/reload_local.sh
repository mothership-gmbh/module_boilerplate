#!/bin/bash
set -e
set -x


BUILDENV="/srv/extension.vm";

cp -f scripts/composer.json ${BUILDENV}
cp -f scripts/.basedir ${BUILDENV}/.modman

if [ -d "${BUILDENV}/.modman/extension" ] ; then
    rm -rf "${BUILDENV}/.modman/extension"
fi

cp -rf . "${BUILDENV}/.modman/extension"

cd ${BUILDENV}
composer.phar install
modman deploy-all --force

magerun cache:clean
magerun sys:module:list |grep Mothership