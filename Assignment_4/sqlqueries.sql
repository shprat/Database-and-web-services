select count(book_id) AS numberofbooks FROM Books;
select count(book_id) AS no_of_mystery_books FROM Books WHERE section = 'mystery';
select author AS mysteryauthors FROM Books WHERE section = 'mystery' GROUP BY author;
select author AS author_with_multiple_books FROM Books WHERE book_id>0 GROUP BY author HAVING count(author)>1;
select * FROM Student INNER JOIN Teacher ON Student.school_name = Teacher.school_name;