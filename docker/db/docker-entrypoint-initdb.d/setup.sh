#!/bin/env bash
psql -U postgres -c "CREATE USER $DB_USERNAME PASSWORD '$DB_PASSWORD'"
psql -U postgres -c "CREATE DATABASE $DB_DATABASE OWNER $DB_USERNAME"