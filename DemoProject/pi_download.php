<script type="text/javascript">
function getChart(dataTable){
    var chartBuilder = Charts.newPieChart()
         .setTitle('Sales Per Region')
         .setDimensions(600, 500)
         .set3D()
         .setDataTable(dataTable);
  
    return chartBuilder.build(); 
  }
  
  function showChart(){
    var dataTable = Charts.newDataTable()
         .addColumn(Charts.ColumnType.STRING, "Region")
         .addColumn(Charts.ColumnType.NUMBER, "Count")
         .addRow(['West', 8000])
         .addRow(['South', 7272])
         .addRow(['Northeast', 5333])
         .addRow(['Midwest', 4444])
         .addRow(['Southwest', 5714])
         .build();
  
    var chart = getChart(dataTable)
  
    //insert into the spreadsheet
    SpreadsheetApp.getActiveSheet().insertChart(chart)
  }

  </script>

  <html>
  <input type="button" name="btn1" value="Go" onclick="getChart(dataTable);" >
  </html>