class UI {
    constructor() {
        this.budgetFeedback =document.querySelector('.budget-feedback');
        this.expenseFeedback = document.querySelector('.expense-feedback');
        this.budgetForm = document.querySelector('#budget-form');
        this.budgetInput = document.querySelector('#budget-input');
        this.budgetAmount = document.querySelector('#budget-amount');
        this.expenseAmount = document.querySelector('#expense-amount');
        this.balance = document.getElementById('balance');
        this.balanceAmount = document.getElementById('balance-amount');
        this.expenseForm = document.querySelector('#expense-form');
        this.expenseInput = document.querySelector('#expense-input');
        this.amountInput = document.querySelector('#amount-input');
        this.expenseList = document.querySelector('#expense-list');
        this.itemList = [];
        this.itemID = 0;
    }
    submitBudgetForm(){
        const value = this.budgetInput.value;
        if(value === '' || value < 0){
            this.budgetFeedback.classList.add('showItem');
            this.budgetFeedback.innerHTML = `<p>value cannot be empty or negetive </p>`
            const self = this;
            // console.log(this);

            setTimeout(function(){
                //  console.log(this);
                //  console.log(self);
            self.budgetFeedback.classList.remove("showItem");
           
            },2000);
        }else{
            this.budgetAmount.textContent = value;
            this.budgetInput.value = "";
            this.showBalance();
        }
    }
    //show balance
    showBalance(){
        const expense = this.totalExpense();
        const total = parseInt(this.budgetAmount.textContent) - expense;
        this.balanceAmount.textContent = total;
        if(total < 0){
            this.balance.classList.remove('showGreen','showBlack');
            this.balance.classList.add('showRed');
        }
        else if(total > 0){
            this.balance.classList.remove('showRed','showBlack');
            this.balance.classList.add('showGreen');
        }
        else if(total === 0){
            this.balance.classList.remove('showRed','showGreen');
            this.balance.classList.add('showBlack');
        }
        
    }
    //submit expense form
    submitExpenseForm() {
        // console.log("hello")
        const expenseValue = this.expenseInput.value;
        const amountValue = this.amountInput.value;
        if(expenseValue === "" || amountValue === "" || amountValue < 0){
            this.expenseFeedback.classList.add("showItem");

            this.expenseFeedback.innerHTML = `<p>value cannot be empty or negetive </p>`
            const self = this;
            
            setTimeout(function(){
                
            self.expenseFeedback.classList.remove("showItem");
           
            },2000);
        }
        else {
            let amount = parseInt(amountValue);
            this.expenseInput.value = "";
            this.amountInput.value = "";
            
                
            let expense = {
                id:this.itemID,
                title:expenseValue,
                amount:amount,
                
            }
            this.itemID++;
            this.itemList.push(expense);
            this.addExpense(expense);
            this.showBalance();
            //show balance
        }
    }
    //add expense
    addExpense(expense){
        const div = document.createElement("div");
        div.classList.add("expense");
        div.innerHTML =`<div class="expense-item d-flex justify-content-between align-items-baseline">
        <h6 class="expense-title mb-0 text-uppercase list-item">- ${expense.title}</h6>
        <h5 class="expense-amount mb-0 list-item">${expense.amount}</h5>
        <div class="expense-icons list-item">
         <a href="#" class="edit-icon mx-2" data-id="${expense.id}">
          <i class="fas fa-edit"></i>
         </a>
         <a href="#" class="delete-icon" data-id="${expense.id}">
          <i class="fas fa-trash"></i>
         </a>
        </div>
       </div>`;
       this.expenseList.appendChild(div);
    }

    //total expense
    totalExpense() {
        let total = 0;
        if (this.itemList.length > 0) {
            total = this.itemList.reduce(function(acc,curr){
            acc+= curr.amount;
                return acc;
            },0)
        }
        this.expenseAmount.textContent = total;
        return total;
    }

    editExpense(element){
        let id = parseInt(element.dataset.id);
        let parent = element.parentElement.parentElement.parentElement;
        this.expenseList.removeChild(parent);
        let expense = this.itemList.filter(function(item){
            return item.id === id;
        })

        this.expenseInput.value = expense[0].title;
        this.amountInput.value = expense[0].amount;
        

        let templist = this.itemList.filter(function(item){
           
            return item.id !== id;

        })
        this.itemList = templist;
        this.showBalance();

    }

    deleteExpense(element){
        let id = parseInt(element.dataset.id);
        let parent = element.parentElement.parentElement.parentElement;

        this.expenseList.removeChild(parent);

        let templist = this.itemList.filter(function(item){
            return item.id !== id;
        })
        this.itemList = templist;
        this.showBalance();
    }
    
}
function eventListenters() {
    const budgetForm = document.getElementById('budget-form');
    const expenseForm = document.getElementById('expense-form');
    const expenseList = document.getElementById('expense-list');
    const edit = document.getElementById("expense-submit").innerHTML;
    
// })
//new instance if UI CLASS
    const ui = new UI()

//budget form submit
    budgetForm.addEventListener('submit',function(event){
        event.preventDefault();
        ui.submitBudgetForm();
    })


    //expense form submit
    expenseForm.addEventListener('submit',function(event){
        event.preventDefault();

        ui.submitExpenseForm();
        
    })


    //expense click
    expenseList.addEventListener('click',function(event){
        if(event.target.parentElement.classList.contains('edit-icon')){
            ui.editExpense(event.target.parentElement)
            
            
        //     let btnName = edit.replace('add',"update");
        //     document.getElementById("expense-submit").innerHTML = btnName;


        // switch ($color) {
        //     case "red":
        //       echo "Hello";
        //       break;
        //     case "green":
        //       echo "Welcome";
        //       break;
            
        //   default:
          
        //       echo "Neither";
        //   }
        }

        
        else if(event.target.parentElement.classList.contains('delete-icon')){
        ui.deleteExpense(event.target.parentElement)
    }
    });
}

document.addEventListener('DOMContentLoaded',function(){
    eventListenters();
})
