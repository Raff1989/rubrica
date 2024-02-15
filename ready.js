

// $(document).ready(function () {
//     $("#list").click(function () {
//         window.location.href = "list.html";
//     });

//     $(document).ready(function() {
//         // Funzione per caricare il contenuto delle pagine
//         function loadPage(page) {
//             $('#content').load(page);
//         }
//     });
    
//         // Gestione del click sui link
//         $('#list').click(function(e) {
//             e.preventDefault();
//             loadPage('index.html');
//         });

    
// });



// $(document).ready(function() {
//     function loadPage(page) {
//         $('#content').load(page);
//     }

//     // Caricamento dinamico delle pagine
//     $('#newContact').click(function(e) {
//         e.preventDefault();
//         loadPage('newContact.html');
//     });

//     $('#cercaContatti').click(function(e) {
//         e.preventDefault();
//         loadPage('search.html');
//     });

   
    
// $(document).ready(function () {
//     $("#detail").click(function () {
//         window.location.href = "detail.html";
//     });

// });

// // $('#detail').click(function(e) {
// //     e.preventDefault();
// //     loadPage('detail.html');
// // });


// $(document).ready(function () {
//     $("#modifica").click(function () {
//         window.location.href = "edit.html";
//     })
// });


// $(document).ready(function () {
//     $("#newContact").click(function () {
//         window.location.href = "newContact.html";
//     })
// });

// $(document).ready(function () {
//     $("#cercaContatti").click(function () {
//         window.location.href = "search.html";
//     })
// });

// $(document).ready(function () {
//     $("#search").click(function () {
//         window.location.href = "search.html";
//     })
// });

// $(document).ready(function () {
//     $("#indietro").click(function () {
//         window.location.href = "newContact.html";
//     })
// });

// });
// $(document).ready(function() {
//     var urlParams = new URLSearchParams(window.location.search);
//     var nome = urlParams.get('nome');
//     var cognome = urlParams.get('cognome');

//     $('#nome').text(nome);
//     $('#cognome').text(cognome);
// });

// function listContacts() {
//     $.ajax("api/index.php?action=list").done(function(data) {
//         $("#listOutput").html(JSON.stringify(data));
//     }).fail(function(e) {
//         console.log("Error", e);
//     });
// }

// function readContact(id) {
//     $.ajax("api/index.php?action=read&id=" + id).done(function(data) {
//         $("#readOutput").html(JSON.stringify(data));
//     }).fail(function(e) {
//         console.log("Error", e);
//     });
// }

// function createContact() {
//     $.ajax({
//         url: "api/index.php?action=create",
//         method: "POST",
//         data: {
//             nome: "John",
//             cognome: "Doe",
//             // Add other fields as needed
//         }
//     }).done(function(data) {
//         $("#createOutput").html(JSON.stringify(data));
//     }).fail(function(e) {
//         console.log("Error", e);
//     });
// }

// function updateContact(id) {
//     $.ajax({
//         url: "api/index.php?action=update&id=" + id,
//         method: "POST",
//         data: {
//             nome: "UpdatedName",
//             // Add other fields as needed
//         }
//     }).done(function(data) {
//         $("#updateOutput").html(JSON.stringify(data));
//     }).fail(function(e) {
//         console.log("Error", e);
//     });
// }

// function deleteContact(id) {
//     $.ajax({
//         url: "api/index.php?action=delete&id=" + id,
//         method: "GET"
//     }).done(function(data) {
//         $("#deleteOutput").html(JSON.stringify(data));
//     }).fail(function(e) {
//         console.log("Error", e);
//     });
// }