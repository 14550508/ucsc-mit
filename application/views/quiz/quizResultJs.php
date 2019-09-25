<script type="text/javascript">

    var quiz_id = '<?= $this->input->get('quizID'); ?>';
	 console.log(quiz_id);
      $(function () {
      $.ajax({
		    url:'<?= base_url() ?>quizzes/resultChart',
		    type: "POST",
		    async: false, 
		    data:{quiz_id: quiz_id},
		    success: function (data)
		        {
                    totle = data;		             	
		        }, 
		});
      var Obj = JSON.parse(totle)
      
      $("#youM").html('YOUR MARK: <?= $quizResult[0]->points; ?>');
      $("#maxM").html('MAX MARK: '+Obj.max);
      $("#aveM").html('AVE MARK: '+Obj.ave);
      $("#minM").html('MIN MARK: '+Obj.min);

      Morris.Bar({
        element: 'hero-bar',
        data: [
          {device: 'You', geekbench: '<?= $quizResult[0]->points; ?>'},
          {device: 'Max', geekbench: Obj.max},
          {device: 'Ave', geekbench: Obj.ave},
          {device: 'Min', geekbench: Obj.min},
         
        ],
        xkey: 'device',
        ykeys: ['geekbench'],
        labels: ['Result'],
        barRatio: 0.4,
        xLabelAngle: 35,
        hideHover: 'auto',
       barColors: function (row, series, type) {

			if(row.label ==      "You") return "#8075c4";
			else if(row.label == "Max") return "#a9d86e";
			else if(row.label == "Ave") return "#777777";
			else if(row.label == "Min") return "#41cac0";
			}
      });

     });

	

   

</script>