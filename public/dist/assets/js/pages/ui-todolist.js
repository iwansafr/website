
dragula([document.getElementById("widget-todo-list")], { moves: function (e, a, t,s) {
    console.log(a)
    return t.classList.contains("cursor-move") 
} })