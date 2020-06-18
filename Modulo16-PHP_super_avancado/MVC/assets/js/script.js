function doSomething() {
    console.info("DOM carregado");
}
  
if (document.readyState === "loading") {  // Ainda carregando
    document.addEventListener("DOMContentLoaded", doSomething);
} else {  // `DOMContentLoaded` foi disparado
    doSomething();
}