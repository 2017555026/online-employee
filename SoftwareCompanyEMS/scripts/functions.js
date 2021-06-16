
function UpdateRoleControl()
{
	str = "Kullanıcının sistemdeki rolü güncellenecek!\nDevam etmek istiyor musunuz?";
	if(confirm(str))
	{
	}
	else
		return false;
}

function UpdateEmployeeControl()
{
	str = "Çalışanın bilgileri güncellenecek.\nDevam etmek istiyor musunuz?";
	if(confirm(str))
	{
	}
	else
		return false;
}

function AddEmployeeControl()
{
	str = "Çalışanın sisteme eklenme işlemi tamamlanacak.\nDevam etmek istiyor musunuz?";
	if(confirm(str))
	{
	}
	else
		return false;
}

function DeleteEmployeeControl()
{
	str = "Çalışan işten çıkarılacak.\nÇalışanın bazı bilgileri veritabanında tutulmaya devam edecek.";
	if(confirm(str))
	{
	}
	else
		return false;
}

