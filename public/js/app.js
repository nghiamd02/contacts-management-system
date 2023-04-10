var d = document.querySelector("#filtered_by_company_id");
d.addEventListener("change", ()=>{
    let companyId = d.value || d.options[d.selectedIndex].value;
    window.location.href = window.location.href.split('?')[0] + "?company_id=" + companyId;
})

document.querySelectorAll('.btn-delete').forEach((button) =>{
    button.addEventListener('click', function(event){
        event.preventDefault();
        if(confirm("Are you sure ?")){
            let action = this.getAttribute('href');
            let form = document.querySelector("#form-delete");
            form.setAttribute('action', action);
            form.submit();
        }
    })
})

document.querySelector("#btn-refresh").addEventListener('click', () => {
    let input = document.querySelector("#search"),
        companySelection = document.querySelector("#filtered_by_company_id");
    input.value= "";
    companySelection.selectedIndex= 0;
    window.location.href = window.location.href.split('?')[0];
})

const toggleRefreshBtn = () =>{
    let query = location.search,
        pattern = /[?&]search=/,
        button = document.querySelector("#btn-refresh");

    if(pattern.test(query)){
        button.style.display= "block";
    }else{
        button.style.display= "none";
    }
}

toggleRefreshBtn();