QUnit.test('method.update', function (assert) {
  var $input = window.createInput();
  var datepicker = $input.datepicker().data('datepicker');
  var val = '2014-02-14';

  $input.val(val);
  $input.datepicker('update');
  assert.equal($input.datepicker('getDate', true), val);
});
