import React, { useState } from "react";
import DisplayBooks from "../../Components/Displaybooks/DisplayBooks";
import "./Home.less";

function Home() {
  const [title,setTitle] = useState('');
  const [author,setAuthor] = useState('');
  const [isbn,setIsbn] = useState('');
  const [books, setBooks] = useState([]);
  const [isEdit, setIsEdit] = useState(null);

  


  const titleInput = (event) => {
    event.preventDefault();
    setTitle(event.target.value);
  };
  const authorInput = (event) => {
    event.preventDefault();
    setAuthor(event.target.value);
  };
  const isbnInput = (event) => {
    event.preventDefault();
    setIsbn(event.target.value);
  };

  const bookFormSubmit = (event) =>{
    event.preventDefault();
    if( title === "" || author === "" || isbn === ""){
      alert("must fill");
      return;
    }
    if(isEdit === null){

      createRecord();
    
    }else{
      updateRecord();
    }
  };

  const createRecord = () => {
    const bookObject = { title, author, isbn };
    setBooks([...books, bookObject]);

    setTitle("");
    setAuthor("");
    setIsbn("");

    
  };
  const updateRecord = () => {
    const currentIndex = isEdit;
    const tempBooks = [...books];
    tempBooks[currentIndex].title = title;
    tempBooks[currentIndex].author = author;
    tempBooks[currentIndex].isbn = isbn;

    setBooks(tempBooks);

    setIsEdit(null);

    setTitle("");
    setAuthor("");
    setIsbn("");
  };
  const deleteBook = (event, index) =>{
    event.preventDefault();
    if (window.confirm("Sure")){
      const tempBooks = [...books];
      tempBooks.splice(index,1);
      setBooks(tempBooks);
    }
  };
  const editBook = (event, index) => {
    event.preventDefault();

    const tempBook = [...books];
    const currentBook = tempBook[index];

    setTitle(currentBook.title);
    setAuthor(currentBook.author);
    setIsbn(currentBook.isbn);

    setIsEdit(index);
  };

  
  return (
    <div className="container">
      <h1>Add Book</h1>
      <form id="book-form" onSubmit={bookFormSubmit}>
        <div>
          <label>Title</label>
          <input
            type="text"
            id="title"
            className="u-full-width"
            value={title}
            onChange= {titleInput}
            
          />
        </div>
        {/* <div>{title}</div> */}
        <div>
          <label>Author</label>
          <input
            type="text"
            id="author"
            className="u-full-width"
            value={author}
            onChange={authorInput}
            
          />
        </div>
        {/* <div>{author}</div> */}
        <div>
          <label>ISBN#</label>
          <input
            type="number"
            id="isbn"
            className="u-full-width"
            onChange={isbnInput}
            value={isbn}
          />
        </div>
        {/* <div>{isbn}</div> */}
        <div>
          <button type="submit" className="u-full-width">
             task
          </button>
        </div>
      </form>
      <DisplayBooks 
            books = {books} 
            deleteBook = {deleteBook}
            editBook = {editBook} 
            />
    </div>
  );
}

export default Home;
