import React, { useState } from "react";
import DisplayBooks from "../../Components/Displaybooks/DisplayBooks";
import "./Home.less";

function Home() {
  const [title,setTitle] = useState('');
  const [author,setAuthor] = useState('');
  const [isbn,setIsbn] = useState('');
  const [books, setBooks] = useState([]);


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
    createRecord();
  };

  const deleteBook = (event, index) =>{
    event.preventDefault();
    if (window.confirm("Sure")){
      const tempBooks = [...books];
      tempBooks.splice(index,1);
      setBooks(tempBooks);
    }
  };
  

  const createRecord = () => {
    const bookObject = {title, author , isbn};
    setBooks([...books, bookObject]);

    setTitle("");
    setAuthor("");
    setIsbn("");
  }
  const editRecord = () =>{
    const currentIndex = isEdit;
    const tempBooks = [...books];
    tempBooks[currentIndex].title = title;
    tempBooks[currentIndex].author = author;
    tempBooks[currentIndex].isbn = isbn;
  }
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
            editBook ={editBook} />
    </div>
  );
}

export default Home;
