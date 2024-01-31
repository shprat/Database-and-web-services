CREATE TABLE Library (
  library_id int AUTO_INCREMENT,
  name char(30),
  address varchar(100),
  PRIMARY KEY(library_id)
);

CREATE TABLE Librarian (
  librarian_id int AUTO_INCREMENT,
  name char(30),
  address varchar(100),
  PRIMARY KEY(librarian_id)
);

CREATE TABLE Members (
  member_id int AUTO_INCREMENT,
  name char(30),
  address varchar(100),
  member_type char(30),
  PRIMARY KEY(member_id)
);

CREATE TABLE Books (
  book_id int AUTO_INCREMENT,
  name char(30),
  author varchar(100),
  section char(30),
  PRIMARY KEY(book_id)
);

CREATE TABLE Teacher (
  member_id int,
  teacher_name char(30),
  department char(30),
  PRIMARY KEY(member_id),
  FOREIGN KEY (member_id) REFERENCES Members(member_id) ON DELETE CASCADE
);

CREATE TABLE Student (
  member_id int,
  institute_name char(30),
  PRIMARY KEY(member_id),
  FOREIGN KEY (member_id) REFERENCES Members(member_id) ON DELETE CASCADE
);

CREATE TABLE Admins (
  admin_id int AUTO_INCREMENT,
  username varchar(100),
  pasword varchar(100),
  ip_address varchar(250),
  PRIMARY KEY(admin_id)
);

CREATE TABLE Has( 
 library_id int, 
 librarian_id int, 
 PRIMARY KEY (library_id, librarian_id), 
 FOREIGN KEY (library_id) REFERENCES Library(library_id), 
 FOREIGN KEY (librarian_id) REFERENCES Librarian(librarian_id) ON DELETE CASCADE
);
 
CREATE TABLE Enrolls( 
 library_id int, 
 member_id int, 
 PRIMARY KEY (library_id, member_id), 
 FOREIGN KEY (library_id) REFERENCES Library(library_id), 
 FOREIGN KEY (member_id) REFERENCES Members(member_id) ON DELETE CASCADE
);
 
CREATE TABLE Holds( 
 library_id int, 
 book_id int, 
 PRIMARY KEY (library_id, book_id), 
 FOREIGN KEY (library_id) REFERENCES Library(library_id), 
 FOREIGN KEY (book_id) REFERENCES Books(book_id) ON DELETE CASCADE
);
 
CREATE TABLE Borrows( 
 member_id int, 
 book_id int, 
 PRIMARY KEY (member_id, book_id), 
 FOREIGN KEY (member_id) REFERENCES Members(member_id), 
 FOREIGN KEY (book_id) REFERENCES Books(book_id) ON DELETE CASCADE
);
 
CREATE TABLE Handles( 
 librarian_id int, 
 workday varchar(100),
 book_id int, 
 PRIMARY KEY (librarian_id, book_id), 
 FOREIGN KEY (librarian_id) REFERENCES Librarian(librarian_id), 
 FOREIGN KEY (book_id) REFERENCES Books(book_id) ON DELETE CASCADE
); 