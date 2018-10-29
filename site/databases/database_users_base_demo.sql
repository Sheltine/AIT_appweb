----
-- phpLiteAdmin database dump (https://bitbucket.org/phpliteadmin/public)
-- phpLiteAdmin version: 1.9.6
-- Exported: 9:47am on October 29, 2018 (UTC)
-- database file: /usr/share/nginx/databases/database.sqlite
----
BEGIN TRANSACTION;

----
-- Drop table for users
----
DROP TABLE "users";

----
-- Table structure for users
----
CREATE TABLE 'users' ('id' INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, 'login' TEXT, 'password' TEXT, 'validity' BOOLEAN DEFAULT 'false', 'role' INTEGER DEFAULT 0 );

----
-- Data dump for users, a total of 6 rows
----
INSERT INTO "users" ("id","login","password","validity","role") VALUES ('2','alain_turing','alain_turing','true','0');
INSERT INTO "users" ("id","login","password","validity","role") VALUES ('3','nyahon','loul','true','1');
INSERT INTO "users" ("id","login","password","validity","role") VALUES ('6','Mr_rubinstein','Mr_rubinstein','true','1');
INSERT INTO "users" ("id","login","password","validity","role") VALUES ('17','dennis_ritchie','dennis_ritchie','false','1');
INSERT INTO "users" ("id","login","password","validity","role") VALUES ('18','Sheltine','12345','true','1');
INSERT INTO "users" ("id","login","password","validity","role") VALUES ('88','The_Donald','The_Donald','true','0');
COMMIT;
