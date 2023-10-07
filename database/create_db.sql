-- Database: db_speechcraft_users

-- DROP DATABASE IF EXISTS db_speechcraft_users;

CREATE DATABASE db_speechcraft_users
    WITH
    OWNER = db_user
    ENCODING = 'UTF8'
    LC_COLLATE = 'Polish_Poland.1250'
    LC_CTYPE = 'Polish_Poland.1250'
    LOCALE_PROVIDER = 'libc'
    TABLESPACE = pg_default
    CONNECTION LIMIT = -1
    IS_TEMPLATE = False;