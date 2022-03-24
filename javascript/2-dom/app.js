let valOfDom;

valOfDom = document;
// https://www.w3schools.com/js/js_htmldom.asp
valOfDom = document;
valOfDom = document.all;
valOfDom = document.all[2];
valOfDom = document.all.length;
valOfDom = document.head;
valOfDom = document.body;
valOfDom = document.doctype;
valOfDom = document.domain;
valOfDom = document.URL;
valOfDom = document.characterSet;
valOfDom = document.contentType;

valOfDom = document.forms;
valOfDom = document.forms[0];
// valOfDom = document.forms[0].id;
valOfDom = document.forms[0].method;
valOfDom = document.forms[0].action;

valOfDom = document.links;
valOfDom = document.links[0];
valOfDom = document.links[0].id;
valOfDom = document.links[0].className;
valOfDom = document.links[0].classList[0];

valOfDom = document.links[0].classList.add("newclass");
valOfDom = document.links[0].classList.remove("newclass");
// valOfDom = document.links[0].className = "asdasd asd asd asd as das da dasd ";

valOfDom = document.images;

valOfDom = document.scripts[0].getAttribute("src");
valOfDom = document.scripts[0].setAttribute("id", "asdasdasd");

valOfDom = document.scripts;

let scripts = document.scripts;

let scriptsArr = Array.from(scripts);

const taskTitle = document.getElementById("task-title");

// Change styling
taskTitle.style.background = "#333";
taskTitle.style.color = "#fff";
taskTitle.style.padding = "20px";
// taskTitle.style.margin = '20px';

taskTitle.style.display = "none";
taskTitle.style.display = "block";

// Change content
taskTitle.textContent = "Task List";
taskTitle.innerText = "My Tasks";
taskTitle.innerHTML = '<span style="color:red">Task List</span>';

// console.log(document.querySelector('#task-title'));
// console.log(document.querySelector('.card-title'));
// console.log(document.querySelector('.collection-item'));
// console.log(document.getElementsByClassName('collection-item'));
// console.log(document.querySelector('h5'));

// document.querySelector('li').style.color = 'red';
document.querySelector("ul li").style.color = "blue";

document.querySelector("li:last-child").style.color = "red";
document.querySelector("li:nth-child(3)").style.color = "yellow";
document.querySelector("li:nth-child(4)").textContent = "Hello World";

const items = document.querySelectorAll("li:nth-child(odd)");
items.forEach(function (singleItem, index) {
  singleItem.style.backgroundColor = "gray";
});

const itemsEven = document.querySelectorAll("li:nth-child(even)");
itemsEven.forEach(function (singleItem) {
  singleItem.style.backgroundColor = "blue";
});

// Traversing Dom

document.querySelector("li a").addEventListener("click", function (event) {
  event.target.parentElement.parentElement.remove();
});

//get children nodes
let valTraversingDom = document.body.childNodes;
// valTraversingDom = list.childNodes[0];
// valTraversingDom = list.childNodes[0].nodeName;
// valTraversingDom = list.childNodes[0].nodeType;

//node type
// 1 - Element
// 2 - Attribute (deprecated)
// 3 - Text node (line break)
// 8 - Comment
// 9 - Document itself
// 10 - Doctype

const list = document.querySelector("ul.collection");

// Get children element nodes
valTraversingDom = list.children;

valTraversingDom = list.children;

valTraversingDom = list.childNodes;

valTraversingDom = list.parentNode;

valTraversingDom = list.parentElement;

// Get children element nodes
valTraversingDom = list.children;
valTraversingDom = list.children[1].textContent = "the text is changed";
// Children of children
// valTraversingDom = list.children[3];
listTwo = document.querySelector(".card-action");
valTraversingDom = listTwo.children[0].children[0].id = "test-link";
// valTraversingDom = list.children[3].children[0].id = 'test-link';

// First child
valTraversingDom = list.firstChild;
valTraversingDom = list.firstElementChild;

// Last child
valTraversingDom = list.lastChild;
valTraversingDom = list.lastElementChild;

// Count child elements
valTraversingDom = list.childElementCount;

// Create new link element
const link = document.createElement("a");
// Add classes
link.className = "delete-item secondary-content";
// Add icon html
link.innerHTML = '<i class="fa fa-remove"></i>';

// Append link into li
// li.appendChild(link);

// REPLACE ELEMENT

// Create Element
const newHeading = document.createElement("h2");
// Add id
newHeading.id = "task-title";
// New text node
newHeading.appendChild(document.createTextNode("Task List"));

// Get the old heading
const oldHeading = document.getElementById("task-title");
//Parent
const cardAction = document.querySelector(".card-action");

// Replace
cardAction.replaceChild(newHeading, oldHeading);

// REMOVE ELEMENT
const listThree = document.querySelector("ul");
const lis = document.querySelectorAll("li");

// lis[0].remove();
// lis[1].remove();

// Remove child element
listThree.removeChild(lis[3]);

//or
// lis[3].remove();

// CLASSES & ATTR
const firstLi = document.querySelector("li:first-child");
const linkTwo = firstLi.children[0];

let valTest;

valTest = linkTwo.className;
valTest = linkTwo.classList;
valTest = linkTwo.classList[0];
linkTwo.classList.add("test");
linkTwo.classList.remove("test");

// Attributes
valTest = linkTwo.getAttribute("href");
valTest = linkTwo.setAttribute("href", "http://google.com");
linkTwo.setAttribute("title", "Google");
valTest = linkTwo.hasAttribute("title"); //true
valTest = linkTwo.hasAttribute("id"); //false
linkTwo.removeAttribute("title");

const taskInput = document.getElementById("task");

// taskInput.addEventListener('change',function(event){
//     console.log(event.target.value);
// })

// const select = document.querySelector("select");
// select.addEventListener("change", function (event) {
//   console.log(event.target.value);
// });

// taskInput.addEventListener("keyup", function (event) {
//   console.log(event.target.value);
// });

// taskInput.addEventListener("keydown", function (event) {
//   console.log(event.target.value);
// });

// taskInput.addEventListener("keypress", function (event) {
//   console.log(event.target.value);
// });

// taskInput.addEventListener("focus", function (event) {
//   console.log(event.target.value);
// });

// Blur
// taskInput.addEventListener("blur", function (event) {
//   console.log(event.target.value);
// });

// taskInput.addEventListener("cut", function (event) {
//   console.log(event.target.value);
// });

// taskInput.addEventListener("paste", function (event) {
//   console.log(event.target.value);
// });

// taskInput.addEventListener("input", function (event) {
//   console.log(event.target.value);
// });

const taskForm = document.getElementById("task-form");

taskForm.addEventListener("submit", function (event) {
  event.preventDefault();
  console.log("submit event");
});
