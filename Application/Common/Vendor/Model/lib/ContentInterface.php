<?php
//����ӿ�
interface ContentInterface{
	//��ȡģ���ֶκ�����
    function getFields();
	//�������
    function add();
	//�༭����
    function edit();
	//ɾ������
    function del();
	//��ȡ�б�
	function c_list();
}