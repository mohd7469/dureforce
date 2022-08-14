#!/bin/bash

# Write your commands here
REMOTE_BRANCH_NAME=$(git branch --contains $(cat .git/HEAD) --remotes |  grep -v HEAD)
BRANCH_NAME="${REMOTE_BRANCH_NAME##*/}"
COMMIT_ID=$(git rev-parse --short HEAD)

if [ "master" == "$BRANCH_NAME" ]; then
    TYPE="prod"
elif [ "main" == "$BRANCH_NAME" ]; then
    TYPE="prod"
else
    TYPE="stg"
fi

echo "$TYPE-$COMMIT_ID"
