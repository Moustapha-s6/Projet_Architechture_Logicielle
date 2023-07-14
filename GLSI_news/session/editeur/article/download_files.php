<script type="text/javascript">
    function tableToJson(table){
      var data = [];
      var headers = [];
      for (var i=0; i<table.rows[0].cells.length; i++){
        headers[i] = table.rows[0].cells[i].innerHTML.toLowerCase().replace(/ /gi,'');
      }
      for (var i=1; i<table.rows.length; i++){
        var tableRow = table.rows[i];
        var rowData = {};
        for (var j=0; j<tableRow.cells.length; j++){
          rowData[ headers[j] ] = tableRow.cells[j].innerHTML;
        }
        data.push(rowData);
      }
      return data;
    }

    var myjson = JSON.stringify(tableToJson(document.getElementById("example1")));
    console.log(myjson);

    function downloadObjectsAsJson(exportObj, exportName){
      var dataStr = "data:text/json;charset=utf-8," + encodeURIComponent(exportObj);
      var downloadAnchorNode = document.createElement('a');
      downloadAnchorNode.setAttribute("href",     dataStr);
      downloadAnchorNode.setAttribute("download", exportName + ".json");
      document.body.appendChild(downloadAnchorNode);
      downloadAnchorNode.click();
      downloadAnchorNode.remove();
    }

    document.getElementById('dl-json').onclick = function(){
      downloadObjectsAsJson(myjson, 'Liste_Articles');
    }
  </script>

  