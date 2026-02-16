create user if not exists 'cms_admin'@'localhost' identified by 'cmsadmin';
grant all privileges on cms.* to 'cms_admin'@'localhost';
create user if not exists 'cms_korisnik'@'localhost' identified by 'cmskorisnik';
grant create,select,update,delete on cms.* to 'cms_korisnik'@'localhost';
grant all privileges on cms_test.* to 'cms_admin'@'localhost';