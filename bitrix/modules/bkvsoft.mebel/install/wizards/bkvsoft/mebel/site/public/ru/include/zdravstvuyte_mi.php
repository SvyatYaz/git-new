<p style="margin-top: 20px;">
                <?
global $USER;
if ($USER->IsAuthorized()){
?>
<input type="hidden" name="userid" value="<?=$USER->GetID()?>" />
������������ <?=$USER->GetFullName()?> , �� ���� ����� ���!
����� ���������� ������ � ������ ��������, �����  ���������� �����.
<?}else{?> 
<input type="hidden" name="userid" value="N" />
                ����� ���������� ������ ��  �������� ����� � ������ �� ������� ��������, ��� ����������� ������.
<?}?>
                </p>