# SmallGroup Website

Created using [CakePHP](https://cakephp.org) framework.

## Project Timeline:
Start: 17-10-18
End: ???

## Reminders

### Database

To create a database via Postgres, change authentication type to 'md5' from 'peer' for all users:

```bash
/etc/postgresql/9.5/main/pg_hba.conf

local all all md5
```

Credits to [depa](https://stackoverflow.com/users/1512956/depa): [StackOverflow solution](https://stackoverflow.com/a/18664239/6353682)

#### Create Database

User:

```bash
CREATE USER phpuser WITH ENCRYPTED PASSWORD 'phpuser';
```

Database:

```bash
CREATE DATABASE phpuser WITH OWNER phpuser;
```

### CakePHP CodeSniffer

Replace PEAR default coding standard to CakePHP:

```bash
$ phpcs --config-set installed_paths /path/to/your/app/vendor/cakephp/cakephp-codesniffer
$ phpcs --config-set default_standard CakePHP
```