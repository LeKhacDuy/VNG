document.addEventListener("DOMContentLoaded", function() {
    const button = document.getElementById("printListTour");
    const downloadPdf = document.getElementById("downloadPdf");
    
    button.addEventListener("click", function() {
        var mywindow = window.open('', 'PRINT', 'height=400,width=600');
        
        mywindow.document.write('<html><head><title>' + document.title  + '</title>');
        mywindow.document.write('</head><body >');
        mywindow.document.write('<h1>' + document.title  + '</h1>');
        mywindow.document.write(document.getElementById("printEl").innerHTML);
        mywindow.document.write('</body></html>');
        
        mywindow.document.close(); // necessary for IE >= 10
        mywindow.focus(); // necessary for IE >= 10*/
        
        mywindow.print();
        mywindow.close();
        
        return true;
    });
    
    downloadPdf.addEventListener("click", function() {
        const element = document.getElementById("printEl");
        element.style.setProperty("max-height", "unset");
        element.style.setProperty("overflow-y", "visible");
        const opt = {
          margin: 0.5,
          filename: 'myFile.pdf',
          image: { type: 'jpeg', quality: 0.98 },
          html2canvas: { scale: 2 },
          jsPDF: { unit: 'in', format: 'A4', orientation: 'portrait' }
        };
        html2pdf().set(opt).from(element).save().then(() => {
            element.style.setProperty("max-height", "860px");
        element.style.setProperty("overflow-y", "scroll");
        });
    });
});