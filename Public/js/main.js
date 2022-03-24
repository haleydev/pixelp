// dark mode
themeColorClear = "#f5f5f5"
themeColorDark = "#202020"

const nightMode = document.querySelector('#darkmod')
const nightModeStorage = localStorage.getItem('idmode')

  nightMode.addEventListener('click', () => {
      document.documentElement.classList.toggle('darkmode')      
      if(document.documentElement.classList.contains('darkmode')) {
        localStorage.setItem('idmode', true)       
        document.querySelector("[name='theme-color']").content = themeColorClear;  
        return
      }
      localStorage.removeItem('idmode')   
      document.querySelector("[name='theme-color']").content = themeColorDark;   
  })    
  
  if(nightModeStorage) {
      document.documentElement.classList.add('darkmode')     
      nightMode.checked = true    
      document.querySelector("[name='theme-color']").content = themeColorClear;  
};

// header mobile
headerId = document.getElementById("header");
$("#nav-toggle").change(function() {
    if($(this).prop('checked')) {
        headerId.className = "header header-active";  
    } else {
        headerId.className = "header"; 
    }
});

//search focus
$( "#search_input" ).focus(function() {
    $(".div-search").css("border-color", "var(--font-color-hover)");     
});
  
$("#search_input").on('blur', function() {
    $(".div-search").removeAttr("style");    
});