#!/bin/bash

#scp the rollback package to destination


cd /home/roydem/database/scp

# $1 is filename

#delete contents first
ssh roydem@192.168.1.10 'rm -rf /home/roydem/scp/*'

#send new rollback version
pv $1 | ssh roydem@192.168.1.10 'cat | tar xz --strip-components=1 -C /home/roydem/scp'
