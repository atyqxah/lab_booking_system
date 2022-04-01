QUnit.test('method.setDate', function (assert) {
  var $input = window.createInput();
  var initialDate = new Date(2014, 1, 14);
  var initialDate2 = '2015-02-15';

  $input.datepicker('setDate', initialDate);
  assert.equal($input.datepicker('getDate').getTime(), initialDate.getTime());

  $input.datepicker('setDate', initialDate2);
  assert.equal($input.datepicker('getDate', true), initialDate2);
});
