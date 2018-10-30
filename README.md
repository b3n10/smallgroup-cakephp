# SmallGroup Website

Moto: Walking with God is not intended to be alone. SmallGroup is here to help and maintain your walk with other believers.

Created using [CakePHP](https://cakephp.org) framework.

## Project Timeline:
Start: 17-10-18

End: ???

## Reminders

### Database

To create a database via Postgres, change authentication type to **md5** from **peer** for all users:

```bash
/etc/postgresql/9.5/main/pg_hba.conf

local all all md5
```

[StackOverflow solution](https://stackoverflow.com/a/18664239/6353682) credits to [depa](https://stackoverflow.com/users/1512956/depa)

#### Create Database

User:

```sql
CREATE USER phpuser WITH ENCRYPTED PASSWORD 'phpuser';
```

Database:

```sql
CREATE DATABASE phpuser WITH OWNER phpuser;
```

### CakePHP CodeSniffer

Replace PEAR default coding standard to CakePHP:

```bash
$ phpcs --config-set installed_paths /path/to/your/app/vendor/cakephp/cakephp-codesniffer
$ phpcs --config-set default_standard CakePHP
```

## TODO

+ Homepage with:
    - gallery of smallgroup pictures
    - testimonials from current members
    - login form

~~+ Accessible Homepage without login~~

~~+ Create UsersTable:
    - first_name
    - last_name
    - phone_number[11] **unique**
    - email_address **unique**
    - password
    - user_type(0 - normal [default], 1 - admin, 2 - mod)~~

~~+ Create GroupsTable:
    - name[20] **unique**
    - description
    - day
    - time
    - place~~

~~+ Create GroupList Table:
    - group_id
    - user_id
    - approved(false [default])~~

+ Add user to a group and show number of group members

+ Disable access to actions via URLs

~~+ Make email & phone unique~~

+ Fix Profile page

+ Normal users allow access to:
    - homepage
    - group index
    - own & other profile

+ Ability to join a group

+ Show count of members in group index

+ Create methods in GroupListsTable for getting members count, checking if user joined a group and if user has been approved
