QUnit.test('method.reset', function (assert) {
  var initialValue = '2014-02-14';
  var $input = window.createInput({
        value: initialValue
      });

  $input.datepicker('show');
  $input.datepicker('setDate', '2014-02-28');
  $input.datepicker('reset');
  assert.equal($input.datepicker('getDate', true), initialValue);
  $input.datepicker('hide');
});
