function bootstrap_alert(message, type, div) {
	$('<div class="alert alert-' + type + ' alert-dismissible fade show" role="alert">' + message + '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>').appendTo('#'+div);
  }

  $(function() {
    var $table = $('table'),
    pagerOptions = {
      container: $(".pager"),
      output: '{startRow} - {endRow} / {filteredRows} ({totalRows})',
      fixedHeight: false,
      removeRows: false,
      cssGoto: '.gotoPage'
    };
    $table
      .tablesorter({
      headerTemplate : '{content} {icon}',
      headers: {
        '.tirafiltro' : {
        sorter: false
        }
      },	
      widgets: ['zebra', 'filter', 'pager' , 'reflow']
    })
      .tablesorterPager(pagerOptions);
  });
  
  function openModal(idModal){
    var nomeModal = document.getElementById(idModal);
    var myModal = new bootstrap.Modal(nomeModal, {
      keyboard: false
    });
    myModal.show();
  }
  
  function closeModal(idModal){
    var myModal = bootstrap.Modal.getInstance(document.getElementById(idModal));
    myModal.hide();
  }
  
function fechaModal(idModal, idForm){
  closeModal(idModal);
  limparForm(idForm);
}

function limparForm(idForm) {
  $('#'+idForm).each (function(){
    this.reset();
  });
}

  function telefone(TelefoneUser) {
    var lenght = TelefoneUser.lenght;
    var tel = TelefoneUser;
    if (lenght === 10) {
      tel =  '(' + TelefoneUser.substring(0, 2) + ') ' + TelefoneUser.substring(2, 6) + '-' + TelefoneUser.substring(6, 10);
    } else if (lenght === 11) {
      tel =  '(' + TelefoneUser.substring(0, 2) + ') ' + TelefoneUser.substring(2, 7) + '-' + TelefoneUser.substring(7, 11);
    }
    return tel;
  }
  
      