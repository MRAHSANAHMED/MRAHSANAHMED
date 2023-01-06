import React from "react";

function DisplayBooks(props) {
  
  const { books,deleteBook,editBook} = props;
  return (
    <table className="u-full-width">
      <thead>
        <tr>
          <th>Title</th>
          <th>Author</th>
          <th>ISBN</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody id="book-list">
        {books.length > 0 &&
          books.map((singleBook, index) => {
            return (
              <tr key={index}>
                <td>{singleBook.title}</td>
                <td>{singleBook.author}</td>
                <td>{singleBook.isbn}</td>
                 <td>
                 <button onClick={(event) => editBook(event, index)}>
                    Edit
                  </button> 
                   <a
                   style={{marginLeft: 20}}
                    href="/"
                    onClick={(event) => deleteBook(event, index)}
                  >
                    X
                  </a>
                </td> 
              </tr>
            );
          })}
      </tbody>
    </table>
  );
}

export default DisplayBooks;
