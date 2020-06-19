<?php

/******************************************************************
* this is the main file of application which contain all the
* functions which are used in the application.
* for each part of application there is a class which has all the
* necessary functions for that part.
*******************************************************************/

// this class has all the variables used during the application job and
// with thier set and get functions for secure access.
class Base
{
	private $id, $userId, $clientId, $name, $company, $phone, $created, $incoming, $outgoing, $currency, $note, $total,
	$equalToDollar,	$exchangeRate, $password, $group, $searchValue, $searchParameter, $currencyTotal, $currencyFilter,
	$money, $capital, $totalTransaction, $totalTempClient, $totalTransmission, $netCapital, $startDate, $endDate, $filterDate;
	
	public function SetId($id)
	{
		$this->id=$id;	
	}
	public function GetId()
	{
		return $this->id;	
	}
	
	public function SetUserId($userId)
	{
		$this->userId=$userId;	
	}
	public function GetUserId()
	{
		return $this->userId;	
	}
	
	public function SetClientId($clientId)
	{
		$this->clientId=$clientId;	
	}
	public function GetClientId()
	{
		return $this->clientId;	
	}
	
	public function SetName($name)
	{
		$this->name=$name;	
	}
	public function GetName()
	{
		return $this->name;	
	}
	
	public function SetCompany($company)
	{
		$this->company=$company;	
	}
	public function GetCompany()
	{
		return $this->company;	
	}
	
	public function SetPhone($phone)
	{
		$this->phone=$phone;	
	}
	public function GetPhone()
	{
		return $this->phone;	
	}
	
	public function SetCreated($created)
	{
		$this->created=$created;	
	}
	public function GetCreated()
	{
		return $this->created;	
	}
	
	public function SetIncoming($incoming)
	{
		$this->incoming=$incoming;	
	}
	public function GetIncoming()
	{
		return $this->incoming;	
	}
	
	public function SetOutgoing($outgoing)
	{
		$this->outgoing=$outgoing;	
	}
	public function GetOutgoing()
	{
		return $this->outgoing;	
	}
	
	public function SetCurrency($currency)
	{
		$this->currency=$currency;	
	}
	public function GetCurrency()
	{
		return $this->currency;	
	}
	
	public function SetNote($note)
	{
		$this->note=$note;	
	}
	public function GetNote()
	{
		return $this->note;	
	}
	
	public function SetTotal($total)
	{
		$this->total=$total;	
	}
	public function GetTotal()
	{
		return $this->total;	
	}
	
	public function SetEqualToDollar($equalToDollar)
	{
		$this->equalToDollar=$equalToDollar;	
	}
	public function GetEqualToDollar()
	{
		return $this->equalToDollar;	
	}
	
	public function SetExchangeRate($exchangeRate)
	{
		$this->exchangeRate=$exchangeRate;	
	}
	public function GetExchangeRate()
	{
		return $this->exchangeRate;	
	}
	
	public function SetPassword($password)
	{
		$this->password=$password;	
	}
	public function GetPassword()
	{
		return $this->password;	
	}
	
	public function SetGroup($group)
	{
		$this->group=$group;	
	}
	public function GetGroup()
	{
		return $this->group;	
	}
	
	public function SetSearchValue($searchValue)
	{
		$this->searchValue=$searchValue;	
	}
	public function GetSearchValue()
	{
		return $this->searchValue;
	}
	
	public function SetSearchParameter($searchParameter)
	{
		$this->searchParameter=$searchParameter;	
	}
	public function GetSearchParameter()
	{
		return $this->searchParameter;	
	}
	
	public function SetCurrencyTotal($currencyTotal)
	{
		$this->currencyTotal=$currencyTotal;
	}
	public function GetCurrencyTotal()
	{
		return $this->currencyTotal;	
	}
	
	public function SetCurrencyFilter($currencyFilter)
	{
		$this->currencyFilter=$currencyFilter;	
	}
	public function GetCurrencyFilter()
	{
		return $this->currencyFilter;	
	}
	
	public function SetMoney($money)
	{
		$this->money=$money;	
	}
	public function GetMoney()
	{
		return $this->money;	
	}
	
	public function SetCapital($capital)
	{
		$this->capital=$capital;	
	}
	public function GetCapital()
	{
		return $this->capital;	
	}
	
	public function SetTotalTransaction($totalTransaction)
	{
		$this->totalTransaction=$totalTransaction;	
	}
	public function GetTotalTransaction()
	{
		return $this->totalTransaction;	
	}
	
	public function SetTotalTempClient($totalTempClient)
	{
		$this->totalTempClient=$totalTempClient;	
	}
	public function GetTotalTempClient()
	{
		return $this->totalTempClient;	
	}
	
	public function SetTotalTransmission($totalTransmission)
	{
		$this->totalTransmission=$totalTransmission;	
	}
	public function GetTotalTransmission()
	{
		return $this->totalTransmission;	
	}
	
	public function SetNetCapital($netCapital)
	{
		$this->netCapital=$netCapital;	
	}
	public function GetNetCapital()
	{
		return $this->netCapital;	
	}
	
	public function SetStartDate($startDate)
	{
		$this->startDate=$startDate;	
	}
	public function GetStartDate()
	{
		return $this->startDate;	
	}
	
	public function SetEndDate($endDate)
	{
		$this->endDate=$endDate;	
	}
	public function GetEndDate()
	{
		return $this->endDate;	
	}
	
	public function SetFilterDate($filterDate)
	{
		$this->filterDate=$filterDate;	
	}
	public function GetFilterDate()
	{
		return $this->filterDate;	
	}
}
////////////////////////////////////////////////////////////////////////////////////////////
// this class is belong to clients and all of their functions
class Clients extends Base
{
	public function DisplayClients()
	{
		require_once "connection.php";
		if($this->GetSearchParameter() !== null && $this->GetSearchValue() !== null)
		{
			// because it's imposible to send tables or columns name as parameter to SQL query I
			// send it as a variable. because this parts are use to check the query is valid
			// or not and they can change like parameter values in runtime.
			$searchParameter=$this->GetSearchParameter();
			$clients = $connection->prepare("SELECT c.*,				
			(select coalesce(sum(t.incoming), 0) - coalesce(sum(t.outgoing), 0) from transactions t where t.client_id = c.id and currency = 'دالر') +
			(select coalesce(sum(t.equal_to_dollar), 0) from transactions t where t.incoming != 0 and currency != 'دالر' and t.client_id = c.id) -
			(select coalesce(sum(t.equal_to_dollar), 0) from transactions t where t.outgoing != 0 and currency != 'دالر' and t.client_id = c.id) as total
			from clients c where {$searchParameter} LIKE ?;");
			$clients->bind_param("s", $searchValue);
			$searchValue="%{$this->GetSearchValue()}%";
		}
		else
		{
			// in select queries I use coalesec() which return result of query to zero if it is null.
			// and it help to prevent whole query return null if only one part doesn't match the condition
			$clients = $connection->prepare("SELECT c.*,	
			(select coalesce(sum(t.incoming), 0) - coalesce(sum(t.outgoing), 0) from transactions t where t.client_id = c.id and currency = 'دالر') +
			(select coalesce(sum(t.equal_to_dollar), 0) from transactions t where t.incoming != 0 and currency != 'دالر' and t.client_id = c.id) -
			(select coalesce(sum(t.equal_to_dollar), 0) from transactions t where t.outgoing != 0 and currency != 'دالر' and t.client_id = c.id) as total
			from clients c;");	
		}
		$clients->execute();
		$clients->store_result();
		$clients->bind_result($id, $userId, $name, $company, $phone, $created, $total);
		?>
			<table>
				<thead>
					<tr>
						<th width="5%">کد نمبر</th>
						<th width="16%">نام</th>
						<th width="21%">شرکت</th>
						<th width="15%">نمبر تماس</th>
						<th width="15%">تاریخ ایجاد حساب</th>
						<th width="15%">بیلانس</th>
						<th width="25%">امکانات</th>
					</tr>
				</thead>
		<?php
		$no = 1;
		while($clients->fetch())
		{
			$this->SetId($id);
			$this->SetName($name);
			$this->SetCompany($company);
			$this->SetPhone($phone);
			$this->SetCreated($created);
			$this->SetTotal($total);
			?>
				<tr>
					<td><?php echo $no;$no++ ?></td>
					<!-- in this cell client name turns to a linke to its transactios page which accompany with its 'id'
					in URL to pass to "DisplayTransaction" function to retrive transactions releated to user and its 'name'
					to display in top of transactions tabale. -->
					<td><a target="_blank" href="../FrontEnd/transactions.php?id=<?php echo $this->GetId(); ?>&name=<?php echo $this->GetName(); ?>"><?php echo $this->GetName(); ?></a></td>
					<td><?php echo $this->GetCompany(); ?></td>
					<td><?php echo $this->GetPhone(); ?></td>
					<td><?php echo $this->GetCreated(); ?></td>
					<td class="numbers"><?php echo $this->GetTotal().' $'; ?></td>
					<td class="userAccess" style="text-align:center">
						<a target="_blank" href="editClient.php?id=<?php echo $this->GetId(); ?>&name=<?php echo $this->GetName(); ?>">ویرایش</a> &nbsp;&nbsp;&nbsp;
						<a target="_blank" href="confirmClientDelet.php?id=<?php echo $this->GetId(); ?>&name=<?php echo $this->GetName(); ?>">حذف</a>
					</td>
				</tr>
			<?php
		}
		$clients->free_result();
		?>
        <tfoot>
            <tr>
                <th class="noPrint" colspan="7"></th>
            </tr>
      	</tfoot>
		</table>
		<?php
	}
	
	public function NewClient()
	{
		require_once "connection.php";
		require_once "jalaliDate.php"; // this class is use to change Gregorian date to jalali date
		$jalaliDate = new jDateTime(false, true, 'Asia/Kabul');
		$jDate = $jalaliDate->date("Y/m/d");
		
		$newClient = $connection->prepare("insert into clients (user_id, name, company, phone, created) values (?, ?, ?, ?, '$jDate')");
		$newClient->bind_param("isss", $userId, $name, $company, $phone);
		
		$userId=$this->GetUserId();
		$name=$this->GetName();
		$company=$this->GetCompany();
		$phone=$this->GetPhone();

		$newClient->execute();
		$newClient->free_result();		
	}
	
	public function EditClient($id)
	{
		require_once("connection.php");	
		
		$edit = $connection->prepare("select * from clients where id = ?");
		$edit->bind_param("i", $clientId);
		$clientId = $id;
		
		$edit->execute();
		$edit->store_result();
		$edit->bind_result($id, $userId, $name, $company, $phone, $created);

		while($edit->fetch())
		{
			$this->SetId($id);
			$this->SetUserId($userId);
			$this->SetName($name);
			$this->SetCompany($company);
			$this->SetPhone($phone);
			?>
			<form action="../php/updateClient.php" method="post">
				<table>
					<tr>
						<th>آی دی</th>
						<td><input readonly id="id" name="id" type="text" size="30" value="<?php echo $this->GetId(); ?>"></td>
					</tr>
					<tr>
						<th>آی دی کاربر</th>
						<td><input disabled type="text" size="30" value="<?php echo $this->GetUserId(); ?>"></td>
					</tr>
					<tr>
						<th>نام</th>
						<td><input id="name" name="name" type="text" size="30" value="<?php echo $this->GetName(); ?>"></td>
					</tr>
					<tr>
						<th>شرکت</th>
						<td><input id="company" name="company" type="text" size="30" value="<?php echo $this->GetCompany(); ?>"></td>
					</tr>
					<tr>
						<th>نمبر تماس</th>
						<td><input id="phone" name="phone" type="text" size="30" value="<?php echo $this->GetPhone(); ?>"></td>
					</tr>
					<tr>
						<td colspan="2" style="text-align:center"><button id="submit" type="submit">ایجاد تغییر</button> <button id="cancel" type="button">لغو تغییر</button></td>
					</tr>
				</table>
			</form>
			<?php
		}
	}	
	
	public function Update()
	{
		require_once("connection.php");
		
		$updateProfile = $connection->prepare("update clients set name = ?, company = ?, phone = ? where id = ?");
		$updateProfile->bind_param("sssi", $name, $company, $phone, $id);
		
		$name=$this->GetName();
		$company=$this->GetCompany();
		$phone=$this->GetPhone();
		$id=$this->GetId();
		
		$updateProfile->execute();
		$updateProfile->free_result();
	}
	
	public function deleteClient()
	{
		require_once "connection.php";
		
		$delete = $connection->prepare("delete from clients where id = ?");
		$delete->bind_param("i", $id);
		
		$id=$this->GetClientId();
		
		$delete->execute();
		$delete->free_result();
	}
}
////////////////////////////////////////////////////////////////////////////////////////////
// this class is for temporary clients and very similar to client class
class TemporaryClients extends Base
{
	public function DisplayTemporaryClients()
	{
		require_once "connection.php";
		if($this->GetSearchParameter() !== null && $this->GetSearchValue() !== null)
		{
			$searchParameter=$this->GetSearchParameter();
			// because like operator doen't work well with date values I check the search parameter
			// and if it is date I use equal operator
			if($searchParameter == "created")
			{
				if($this->GetSearchValue() != "")
				{
					$clients = $connection->prepare("SELECT * from temporary_clients where {$searchParameter} = ?");
					$clients->bind_param("s", $searchValue);
					$searchValue=$this->GetSearchValue();
				}
				else
				{
					$clients = $connection->prepare("SELECT * from temporary_clients");	
				}
			}
			else
			{
				$clients = $connection->prepare("SELECT * from temporary_clients where {$searchParameter} LIKE ?");
				$clients->bind_param("s", $searchValue);
				$searchValue="%{$this->GetSearchValue()}%";
			}
		}
		else
		{
			$clients = $connection->prepare("SELECT * from temporary_clients");	
		}
		$clients->execute();
		$clients->store_result();
		$clients->bind_result($id, $userId, $name, $incoming, $outgoing, $currency, $exchangeRate, $equalToDollar,
		$note, $created);
		?>
			<table>
				<thead>
					<tr>
						<th width="3%">ردیف</th>
						<th width="10%">نام</th>
						<th width="10%">آمد پول</th>
						<th width="10%">رفت پول</th>
						<th width="10%">واحد پول</th>
						<th width="10%">نرخ تبادله</th>
						<th width="10%">معادل به دالر</th>
                        <th width="20%">از درک</th>
                        <th width="7%">تاریخ</th>
                        <th class="noPrint" width="10%">امکانات</th>
					</tr>
				</thead>
		<?php
		$no = 1;
		while($clients->fetch())
		{
			$this->SetId($id);
			$this->SetName($name);
			$this->SetIncoming($incoming);
			$this->SetOutgoing($outgoing);
			$this->SetCurrency($currency);
			$this->SetExchangeRate($exchangeRate);
			$this->SetEqualToDollar($equalToDollar);
			$this->SetNote($note);
			$this->SetCreated($created);
			?>
				<tr>
					<td><?php echo $no; $no++ ?></td>
					<td><?php echo $this->GetName(); ?></td>
					<td class="numbers"><?php echo preg_replace('/\b0\.00\b/', '', $this->GetIncoming()); ?></td>
					<td class="numbers"><?php echo preg_replace('/\b0\.00\b/', '', $this->GetOutgoing()); ?></td>
                    <td><?php echo $this->GetCurrency(); ?></td>
                    <td><?php echo preg_replace('/\b0\.00\b/', '', $this->GetExchangeRate()); ?></td>
                    <td class="numbers"><?php echo preg_replace('/\b0\.00\b/', '', $this->GetEqualToDollar()); ?></td>
                    <td><?php echo $this->GetNote(); ?></td>
					<td><?php echo $this->GetCreated(); ?></td>
					<td class="userAccess noPrint" style="text-align:center">
						<a target="_blank" href="editTempClient.php?id=<?php echo $this->GetId(); ?>&name=<?php echo $this->GetName(); ?>">ویرایش</a> &nbsp;&nbsp;
						<a target="_blank" href="confirmTempClientDelete.php?id=<?php echo $this->GetId(); ?>&name=<?php echo $this->GetName(); ?>">حذف</a>
					</td>
				</tr>
			<?php
		}
		$clients->free_result();
		?>
		</table>
		<?php
	}
	
	public function NewTempClient()
	{
		require_once "connection.php";
		require_once "jalaliDate.php"; // this class is use to change Gregorian date to jalali date
		$jalaliDate = new jDateTime(false, true, 'Asia/Kabul');
		$jDate = $jalaliDate->date("Y/m/d");
		
		$newTempClient = $connection->prepare("insert into temporary_clients (user_id, name, incoming, outgoing, currency, exchange_rate, equal_to_dollar, note, created)
		values (?, ?, ?, ?, ?, ?, ?, ?, '$jDate')");
		$newTempClient->bind_param("isddsdds", $userId, $name, $incoming, $outgoing, $currency, $exchangeRate, $equalToDollar, $note);
		
		$userId=$this->GetUserId();
		$name=$this->GetName();
		$incoming = $this->GetIncoming();
		$outgoing = $this->GetOutgoing();
		$currency = $this->GetCurrency();
		$exchangeRate = $this->GetExchangeRate();
		$equalToDollar = $this->GetEqualToDollar();
		$note = $this->GetNote();

		$newTempClient->execute();
		$newTempClient->free_result();		
	}
	
	public function EditTempClient($id)
	{
		require_once("connection.php");	
		
		$edit = $connection->prepare("select * from temporary_clients where id = ?");
		$edit->bind_param("i", $clientId);
		$clientId = $id;
		
		$edit->execute();
		$edit->store_result();
		$edit->bind_result($id, $userId, $name, $incoming, $outgoing, $currency, $exchangeRate, $equalToDollar, $note, $created);

		while($edit->fetch())
		{
			$this->SetId($id);
			$this->SetUserId($userId);
			$this->SetName($name);
			$this->SetIncoming($incoming);
			$this->SetOutgoing($outgoing);
			$this->SetCurrency($currency);
			$this->SetExchangeRate($exchangeRate);
			$this->SetEqualToDollar($equalToDollar);
			$this->SetNote($note);
			?>
			<form action="../php/updateTempClient.php" method="post">
				<table>
					<tr>
						<th>آی دی</th>
						<td><input readonly id="id" name="id" type="text" size="30" value="<?php echo $this->GetId(); ?>"></td>
					</tr>
					<tr>
						<th>آی دی کاربر</th>
						<td><input readonly type="text" size="30" value="<?php echo $this->GetUserId(); ?>"></td>
					</tr>
					<tr>
						<th>نام</th>
						<td><input id="name" name="name" type="text" size="30" value="<?php echo $this->GetName(); ?>"></td>
					</tr>
					<tr>
						<th>آمد پول</th>
						<td><input id="incoming" name="incoming" type="text" size="30" value="<?php echo preg_replace('/\b0\.00\b/', '', $this->GetIncoming()); ?>"></td>
					</tr>
					<tr>
						<th>رفت پول</th>
						<td><input id="outgoing" name="outgoing" type="text" size="30" value="<?php echo preg_replace('/\b0\.00\b/', '', $this->GetOutgoing()) ?>"></td>
					</tr>
                    <tr>
						<th>واحد پول</th>
						<td>                           
                        	<select id="currency" name="currency">
                           		<?php $cur = $this->GetCurrency(); echo "<option selected value='$cur'>$cur</option>" ?>
                                <option value="دالر">دالر</option>
                             	<option value="یورو">یورو</option>
                                <option value="پوند انگلیس">پوند انگیس</option>
                                <option value="افغانی">افغانی</option>
                                <option value="روپیه">روپیه</option>
                                <option value="کلدار">کلدار</option>
                                <option value="تومان">تومان</option>
                                <option value="ریال عربستان">ریال عربستان</option>
                                <option value="متفرقه">متفرقه</option>
                            </select>
                       </td>
					</tr>
                    <tr id="otherCurrency" hidden="">
                        <th><label for="otherCurrency">واحد پولی متفرقه</label></th>
                        <td><input type="text" id="otherCurrency" name="otherCurrency" size="30"></td>
                    </tr>
                    <tr>
						<th>نرخ تبادله</th>
						<td><input id="exchangeRate" name="exchangeRate" type="text" size="30" value="<?php echo preg_replace('/\b0\.00\b/', '', $this->GetExchangeRate()); ?>"></td>
					</tr>
                    <tr>
						<th>معادل به دالر</th>
						<td><input readonly id="equalToDollar" name="equalToDollar" type="text" size="30" value="<?php echo preg_replace('/\b0\.00\b/', '', $this->GetEqualToDollar()); ?>"></td>
					</tr>
                    <tr>
						<th>از درک</th>
						<td><textarea id="note" name="note" size="30"><?php echo $this->GetNote(); ?></textarea></td>
					</tr>
					<tr>
						<td colspan="2" style="text-align:center"><button id="submit" type="submit">ایجاد تغییر</button> <button id="cancel" type="button">لغو تغییر</button></td>
					</tr>
				</table>
			</form>
			<?php
		}
	}	
	
	public function UpdateTempClient()
	{
		require_once("connection.php");
		
		$updateProfile = $connection->prepare("update temporary_clients set name = ?, incoming = ?, outgoing = ?,
		currency = ?, exchange_rate = ?, equal_to_dollar = ?, note = ? where id = ?");
		$updateProfile->bind_param("sddsddsi",  $name, $incoming, $outgoing, $currency, $exchangeRate, $equalToDollar, $note, $id);
		
		$name=$this->GetName();
		$incoming=$this->GetIncoming();
		$outgoing=$this->GetOutgoing();
		$currency=$this->GetCurrency();
		$exchangeRate=$this->GetExchangeRate();
		$equalToDollar=$this->GetEqualToDollar();
		$note=$this->GetNote();
		$id=$this->GetId();
		
		$updateProfile->execute();
		$updateProfile->free_result();
	}
	
	public function deleteTempClient()
	{
		require_once "connection.php";
		
		$delete = $connection->prepare("delete from temporary_clients where id = ?");
		$delete->bind_param("i", $id);
		
		$id=$this->GetClientId();
		
		$delete->execute();
		$delete->free_result();
	}
}

////////////////////////////////////////////////////////////////////////////////////////////
// this class is for managing users and contain functions like login user and create new user.
class Users extends Base
{
	public function Login()
	{
		require_once("connection.php");
		
		$user = $connection->prepare("select id, name, groups, password from users where name = ?");
		
		$user->bind_param("s", $name);
		
		$name=$this->GetName();
		$userPassword=$this->GetPassword();
		
		$user->execute();
		$user->store_result();

		if($user->num_rows == 1)
		{
			$user->bind_result($userId, $name, $group, $password);
			while($user->fetch())
			{
				$this->SetUserId($userId);
				$this->SetName($name);	
				$this->SetGroup($group);
				$this->SetPassword($password);
			}
			
			if(password_verify($userPassword,$this->GetPassword()))
			{
				$user->free_result();
				header('location:  frontend/clients.php');
				return true;	
			}
			else
			{
				
				echo "<script type='text/javascript'>
				location = 'index.html'
				alert('Incorrect Password!');
				</script>";
				return false;
			}
			
		}
		else
		{
			echo "<script type='text/javascript'>
			location = 'index.html'
			alert('Incorrect user name!');
			</script>";
			return false;	
		}
	}
	
	public function DisplayUser()
	{
		require_once("connection.php");
		
		$displayUser = $connection->prepare("select `id`, `name`, `groups`, `created` from users");		
		$displayUser->execute();
		$displayUser->store_result();
		$displayUser->bind_result($userId, $name, $group, $created);
		?>
        <table>
            <thead>
                <tr>
                    <th width="5%">کد نمبر</th>
                    <th width="10%">نام</th>
                    <th width="10%">گروپ</th>
                    <th width="10%">تاریخ ایجاد حساب</th>
                    <th width="10%">امکانات</th>
                </tr>
            </thead>
            <tbody>
        <?php
		while($displayUser->fetch())
		{
			$this->SetUserId($userId);
			$this->SetName($name);
			$this->SetGroup($group);
			$this->SetCreated($created);
		?>
        	<tr>
            	<td><?php echo $this->GetUserId(); ?></td>
                <td><?php echo $this->GetName(); ?></td>
                <td><?php echo $this->GetGroup(); ?></td>
                <td><?php echo $this->GetCreated(); ?></td>
                <td style="text-align:center">
                	<a target="_blank" href="editUserForm.php?id=<?php echo $this->GetUserId();?>&name=<?php echo $this->GetName(); ?>">ویرایش</a>&nbsp;&nbsp;&nbsp;&nbsp;
                	<a target="_blank" href="confirmUserDelete.php?id=<?php echo $this->GetUserId();?>&name=<?php echo $this->GetName(); ?>">حذف</a>
                </td>
            </tr>
        <?php	
		}
		?>
        </tbody>
        </table>
        <?php
		$displayUser->free_result();
	}
	
	public function NewUser()
	{
		require_once("connection.php");
		require_once "jalaliDate.php"; // this class is use to change Gregorian date to jalali date
		$jalaliDate = new jDateTime(false, true, 'Asia/Kabul');
		$jDate = $jalaliDate->date("Y/m/d");
		
		$newUser=$connection->prepare("INSERT INTO users (`name`, `groups`, `password`, created) VALUES (?, ?, ?, '$jDate')");			
		$newUser->bind_param("sss", $name, $group, $password);
		
		$group = $this->GetGroup();
		$name = $this->GetName();
		$password = $this->GetPassword();
		
		$newUser->execute();
		$newUser->free_result();
	}
	
	public function EditUser($id)
	{
		require_once "connection.php";
		
		$editUser = $connection->prepare("select id, name, `groups` from users where id = ?");
		$editUser->bind_param("i", $uId);
		
		$uId = $id;
		
		$editUser->execute();
		$editUser->store_result();
		$editUser->bind_result($id, $name, $group);
		
		while($editUser->fetch())
		{
			$this->SetId($id);
			$this->SetName($name);
			$this->SetGroup($group);
		?>
			<form action="../php/updateUser.php" method="post">
				<table>
					<tr>
						<th>آی دی</th>
						<td><input readonly id="id" name="id" type="text" size="30" value="<?php echo $this->GetId(); ?>"></td>
					</tr>
					<tr>
						<th>نام</th>
						<td><input id="name" name="name" type="text" size="30" value="<?php echo $this->GetName(); ?>"></td>
					</tr>
					<tr>
						<th>گروپ</th>
						<td><input id="group" name="group" type="text" size="30" value="<?php echo $this->GetGroup(); ?>"></td>
					</tr>
					<tr>
						<td colspan="2" style="text-align:center">
                        	<button id="update" type="submit">ایجاد تغییر</button>
                        	<button id="cancel" type="button">لغو تغییر</button>
                        </td>
					</tr>
				</table>
			</form>
			<?php
		}
	}
	
	public function UserUpdate()
	{
		require_once("connection.php");
		
		$userUpdate = $connection->prepare("update users set name = ?, `groups` = ? where id = ?");
		$userUpdate->bind_param("ssi", $name, $group, $id);
		
		$name=$this->GetName();
		$group=$this->GetGroup();
		$id=$this->GetId();
		
		$userUpdate->execute();
		$userUpdate->free_result();
	}
	
	public function DeleteUser()
	{
		require_once("connection.php");
		
		$deleteUser = $connection->prepare("delete from users where id = ?");
		$deleteUser->bind_param("i", $id);
		
		$id = $this->GetUserId();
		
		$deleteUser->execute();
		$deleteUser->free_result();
	}
}
/////////////////////////////////////////////////////////////////////////////////////////////
// this class control all function related to transactions like displaying, adding or editing
class Transactions extends Base
{
	public function DisplayTransaction($id, $name)
	{
		require ("connection.php");
		
		$transaction = $connection->prepare("select id, incoming, outgoing, currency, exchange_rate, equal_to_dollar, note, created,
			(select coalesce(sum(incoming), 0) - coalesce(sum(outgoing), 0) from transactions where client_id = ? and currency = 'دالر') +
			(select coalesce(sum(equal_to_dollar), 0) from transactions where incoming != 0 and currency != 'دالر' and client_id = ?) -
			(select coalesce(sum(equal_to_dollar), 0) from transactions where outgoing != 0 and currency != 'دالر' and client_id = ?) as total
		from transactions where client_id = ? order by created asc ");
		$transaction->bind_param("iiii", $clientId, $clientId, $clientId, $clientId);
		$clientId=$id;
		
		$this->SetName($name); // this name will use in confitm delete transaction
		$transaction->execute();
		$transaction->store_result();
		$transaction->bind_result($id, $incoming, $outgoing, $currency, $exchangeRate, $equalToDollar, $note, $created, $total);
	
		$no=1; // this variable is for numbering the list
		while($transaction->fetch())
		{
			$this->SetId($id);
			$this->SetIncoming($incoming);
			$this->SetOutgoing($outgoing);
			$this->SetCurrency($currency);
			$this->SetExchangeRate($exchangeRate);
			$this->SetEqualToDollar($equalToDollar);
			$this->SetNote($note);
			$this->SetCreated($created);
			$this->SetTotal($total);
			?>
				<tr>
					<td><?php echo $no; $no++ ?></td>
                    <!-- by using preg_replace('/\b0\.00\b/', '', text) method system will replace all 0.00 with blank value
                    to make display transaction page clearer. by using \b in start and end of pattern it will match the exact
                    case and if we remove them it will replace all zeros in other numbers too-->
					<td class="numbers"><?php echo preg_replace('/\b0\.00\b/', '', $this->GetIncoming()); ?></td>
					<td class="numbers"><?php echo preg_replace('/\b0\.00\b/', '', $this->GetOutgoing()); ?></td>
					<td style="font-weight:bold"><?php echo $this->GetCurrency(); ?></td>
					<td><?php echo preg_replace('/\b0\.00\b/', '', $this->GetExchangeRate()); ?></td>
					<td class="numbers"><?php echo preg_replace('/\b0\.00\b/', '', $this->GetEqualToDollar()); ?></td>
					<td><?php echo $this->GetNote(); ?></td>
					<td><?php echo $this->GetCreated(); ?></td>
					<td class="noPrint userAccess" style="text-align:center">
                    	<a target="_blank" href="editTransactionForm.php?id=<?php echo $this->GetId(); ?>">ویرایش</a>&nbsp;&nbsp;&nbsp;
                        <a target="_blank" href="confirmTransactionDelete.php?id=<?php echo $this->GetId(); ?>&name=<?php echo $this->GetName(); ?>">حذف</a>
                    </td>
				</tr>
			<?php
		}
		?>
		<tfoot class="noPrint">
			<tr>
				<th colspan="2">مجموع</th>
				<th>
					<?php
						if($this->GetTotal() < 0)
					 		echo "<span style='color:red'>" . $this->GetTotal() . ' $' . "</span>";
						else
							echo $this->GetTotal() . ' $'; 
					 ?>
                </th>
				<!-- in this cell system calls the 'TotalCurrency' function by using ($this) to display total of each currency -->
				<th id="totals" style="text-align:right" colspan="6"><?php $this->TotalCurrency($clientId) ?></th>
			</tr>
		</tfoot>
		<?php
		$transaction->free_result();
	}
	
	// this function will search content between transactions.
	public function Search($id, $name)
	{
		require_once("connection.php");
		
		// because it's imposible to send tables or columns name as parameter to SQL query I
		// send it as a variable. because this parts are use to check the query is valid
		// or not and they can change like parameter values in runtime.
		$searchParameter=$this->GetSearchParameter();
		// this condition will check if searched value is date for better result it will use
		// equal operator instead of LIKE operator in search query
		if($searchParameter == "created")
		{
			if($this->GetSearchValue() != "")
			{
				$search = $connection->prepare("select id, incoming, outgoing, currency, exchange_rate, equal_to_dollar, note, created
				from transactions where client_id = ? and {$searchParameter} = ? order by created asc");
				$search->bind_param("is", $clientId,  $searchValue);
				$clientId=$id;
				$searchValue=$this->GetSearchValue();
			}
			else
			{
				$search = $connection->prepare("select id, incoming, outgoing, currency, exchange_rate, equal_to_dollar, note, created
				from transactions where client_id = ? order by created asc");
				$search->bind_param("i", $clientId);
				$clientId=$id;	
			}
		
		}
		else
		{
			$search = $connection->prepare("select id, incoming, outgoing, currency, exchange_rate, equal_to_dollar, note, created
			from transactions where client_id = ? and {$searchParameter} LIKE ? order by created asc");
			$search->bind_param("is", $clientId,  $searchValue);
			$clientId=$id;
			$searchValue="%{$this->GetSearchValue()}%";
		}
		
		$this->SetName($name); // this name will use in confitm delete transaction
		$search->execute();
		$search->store_result();
		$search->bind_result($id, $incoming, $outgoing, $currency, $exchangeRate, $equalToDollar, $note, $created);
		
		$no=1; // this variable is for numbering the list
		while($search->fetch())
		{
			$this->SetId($id);
			$this->SetIncoming($incoming);
			$this->SetOutgoing($outgoing);
			$this->SetCurrency($currency);
			$this->SetExchangeRate($exchangeRate);
			$this->SetEqualToDollar($equalToDollar);
			$this->SetNote($note);
			$this->SetCreated($created);
			?>
				<tr>
					<td><?php echo $no; $no++ ?></td>
                    <!-- by using preg_replace('/\b0\.00\b/', '', text) method system will replace all 0.00 with blank value
                    to make display transaction page clearer. by using \b in start and end of pattern it will match the exact
                    case and if we remove them it will replace all zeros in other numbers too-->
					<td class="numbers"><?php echo preg_replace('/\b0\.00\b/', '', $this->GetIncoming()); ?></td>
					<td class="numbers"><?php echo preg_replace('/\b0\.00\b/', '', $this->GetOutgoing()); ?></td>
					<td style="font-weight:bold"><?php echo $this->GetCurrency(); ?></td>
					<td><?php echo preg_replace('/\b0\.00\b/', '', $this->GetExchangeRate()); ?></td>
					<td class="numbers"><?php echo preg_replace('/\b0\.00\b/', '', $this->GetEqualToDollar()); ?></td>
					<td><?php echo $this->GetNote(); ?></td>
					<td><?php echo $this->GetCreated(); ?></td>
					<td class="noPrint userAccess" style="text-align:center">
                    	<a target="_blank" href="editTransactionForm.php?id=<?php echo $this->GetId(); ?>">ویرایش</a>&nbsp;&nbsp;&nbsp;
                        <a target="_blank" href="confirmTransactionDelete.php?id=<?php echo $this->GetId(); ?>&name=<?php echo $this->GetName(); ?>">حذف</a>
                    </td>
				</tr>
			<?php
		}
		$search->free_result();
	}
	
	// this function retrive all currencies that client have transaction whit them.
	// and it will use in currency field for filtering currencies.
	public function SelectCurrency($id)
	{
		require_once "connection.php";
		
		$selectCurrency = $connection->prepare("select distinct currency from transactions where client_id = ?");
		$selectCurrency->bind_param("i", $Cid);
		$Cid = $id;
		$selectCurrency->execute();
		$selectCurrency->store_result();
		$selectCurrency->bind_result($currency);
		while($selectCurrency->fetch())
		{
			$this->SetCurrency($currency);
			?>
            <option value="<?php echo $this->GetCurrency(); ?>"><?php echo $this->GetCurrency(); ?></option>
			<?php	
		}
		$selectCurrency->free_result();
	}
	
	public function CurrencyFilter($id)
	{
		require_once "connection.php";
		
		if($this->GetCurrencyFilter() != "")
		{
		$transaction = $connection->prepare("select id, incoming, outgoing, currency, exchange_rate, equal_to_dollar, note, created
		from transactions where client_id = ? and currency = ? order by created asc");
		$transaction->bind_param("is", $clientId, $filter);
		$clientId=$id;
		$filter = $this->GetCurrencyFilter();
		}
		else
		{
			$transaction = $connection->prepare("select id, incoming, outgoing, currency, exchange_rate, equal_to_dollar, note, created
			from transactions where client_id = ? order by created asc");
			$transaction->bind_param("i", $clientId);
			$clientId=$id;	
		}
		$transaction->execute();
		$transaction->store_result();
		$transaction->bind_result($id, $incoming, $outgoing, $currency, $exchangeRate, $equalToDollar, $note, $created);
		?>
			<table>
		<?php
		$no=1; // this variable is for numbering the list
		while($transaction->fetch())
		{
			$this->SetId($id);
			$this->SetIncoming($incoming);
			$this->SetOutgoing($outgoing);
			$this->SetCurrency($currency);
			$this->SetExchangeRate($exchangeRate);
			$this->SetEqualToDollar($equalToDollar);
			$this->SetNote($note);
			$this->SetCreated($created);
			?>
				<tr>
					<td><?php echo $no; $no++ ?></td>
                    <!-- by using preg_replace('/\b0\.00\b/', '', text) method system will replace all 0.00 with blank value
                    to make display transaction page clearer. by using \b in start and end of pattern it will match the exact
                    case and if we remove them it will replace all zeros in other numbers too-->
					<td class="numbers"><?php echo preg_replace('/\b0\.00\b/', '', $this->GetIncoming()); ?></td>
					<td class="numbers"><?php echo preg_replace('/\b0\.00\b/', '', $this->GetOutgoing()); ?></td>
					<td style="font-weight:bold"><?php echo $this->GetCurrency(); ?></td>
					<td><?php echo preg_replace('/\b0\.00\b/', '', $this->GetExchangeRate()); ?></td>
					<td class="numbers"><?php echo preg_replace('/\b0\.00\b/', '', $this->GetEqualToDollar()); ?></td>
					<td><?php echo $this->GetNote(); ?></td>
					<td><?php echo $this->GetCreated(); ?></td>
					<td class="noPrint userAccess" style="text-align:center">
                    	<a target="_blank" href="editTransactionForm.php?id=<?php echo $this->GetId(); ?>">ویرایش</a>&nbsp;&nbsp;&nbsp;
                        <a target="_blank" href="confirmTransactionDelete.php?id=<?php echo $this->GetId(); ?>&name=<?php echo $this->GetName(); ?>">حذف</a>
                    </td>
				</tr>
			<?php
		}
		?>
		</table>
		<?php
		$transaction->free_result();
	}
	
	// this function sum total of each currency. it takes on parameter which is 
	// ID of client to return client related information.
	public function TotalCurrency($id)
	{
		require "connection.php";
		$totalCurrency=$connection->prepare("select currency, (coalesce(sum(incoming), 0) - coalesce(sum(outgoing), 0)) as currencyTotal
		from transactions where client_id = ? group by currency");
		$totalCurrency->bind_param("i", $clientId);
		$clientId=$id;
		$totalCurrency->execute();
		$totalCurrency->store_result();
		$totalCurrency->bind_result($currency, $currencyTotal);
		
		while($totalCurrency->fetch())
		{
			$this->SetCurrency($currency);
			$this->SetCurrencyTotal($currencyTotal);
			if($this->GetCurrencyTotal() < 0)
			{	
				echo $this->GetCurrency() . " : <span style='color:red'>" . $this->GetCurrencyTotal() . "</span>   |  ";	
			}
			else
			{
				echo $this->GetCurrency() . '  :  ' . $this->GetCurrencyTotal() . '  |  '; 	
			}
		}	
		$totalCurrency->free_result();
	}
	
	public function NewTransaction()
	{
		require_once "connection.php";
		require_once "jalaliDate.php"; // this class is use to change Gregorian date to jalali date
		$jalaliDate = new jDateTime(false, true, 'Asia/Kabul');
		$jDate = $jalaliDate->date("Y/m/d");
		
		$newTransaction = $connection->prepare("insert into transactions (user_id, client_id, incoming, outgoing, currency,
		exchange_rate, equal_to_dollar, note, created) values (?, ?, ?, ?, ?, ?, ?, ?, '$jDate')");
		$newTransaction->bind_param("iiddsdds", $userId, $id, $incoming, $outgoing, $currency, $exchangeRate, $equalToDollar, $note);
		
		$userId = $this->GetUserId();
		$id = $this->GetId();
		$incoming = $this->GetIncoming();
		$outgoing = $this->GetOutgoing();
		$currency = $this->GetCurrency();
		$exchangeRate = $this->GetExchangeRate();
		$equalToDollar = $this->GetEqualToDollar();
		$note = $this->GetNote();
		
		$newTransaction->execute();
		$newTransaction->free_result();
	}
	
	public function EditTransactionForm($Tid)
	{
		require_once "connection.php";
		$editTransaction = $connection->prepare("select * from transactions where id = ?");
		$editTransaction->bind_param("i", $id);
		
		$id = $Tid;
		
		$editTransaction->execute();
		$editTransaction->store_result();
		$editTransaction->bind_result($id, $userId, $clientId, $incoming, $outgoing, $currency, $exchangeRate, $equalToDollar, $note, $created);
		while($editTransaction->fetch())
		{
			$this->SetId($id);
			$this->SetUserId($userId);
			$this->SetClientId($clientId);
			$this->SetIncoming($incoming);
			$this->SetOutgoing($outgoing);
			$this->SetCurrency($currency);
			$this->SetExchangeRate($exchangeRate);
			$this->SetEqualToDollar($equalToDollar);
			$this->SetNote($note);
			$this->SetCreated($created);
			?>
			<form action="../php/updateTransaction.php" method="post">
				<table>
					<tr>
						<th>آی دی معامله</th>
						<td><input readonly id="id" name="id" type="text" size="30" value="<?php echo $this->GetId(); ?>"></td>
					</tr>
					<tr>
						<th>آی دی کاربر</th>
						<td><input readonly id="user_id" name="user_id" type="text" size="30" value="<?php echo $this->GetUserId(); ?>"></td>
					</tr>
                    <tr>
						<th>آی دی معامله دار</th>
						<td><input readonly id="client_id" name="client_id" type="text" size="30" value="<?php echo $this->GetClientId(); ?>"></td>
					</tr>
					<tr>
						<th>آمد پول</th>
						<td><input id="income" name="income" type="text" size="30" value="<?php echo preg_replace('/\b0\.00\b/', '', $this->GetIncoming()); ?>"></td>
					</tr>
					<tr>
						<th>رفت پول</th>
						<td><input id="outgo" name="outgo" type="text" size="30" value="<?php echo preg_replace('/\b0\.00\b/', '', $this->GetOutgoing()); ?>"></td>
					</tr>
					<tr>
						<th>واحد پول</th>
						<td>
                           <select id="currency" name="currency">
                           <?php $cur = $this->GetCurrency(); echo "<option selected value='$cur'>$cur</option>" ?>
                                <option value="دالر">دالر</option>
                             	<option value="یورو">یورو</option>
                                <option value="پوند انگلیس">پوند انگلیس</option>
                                <option value="افغانی">افغانی</option>
                                <option value="روپیه">روپیه</option>
                                <option value="کلدار">کلدار</option>
                                <option value="تومان">تومان</option>
                                <option value="ریال عربستان">ریال عربستان</option>
                                <option value="متفرقه">متفرقه</option>
                            </select>
                        </td>
					</tr>
                    <tr id="otherCurrency" hidden="">
                        <th><label for="otherCurrency">واحد پولی متفرقه</label></th>
                        <td><input type="text" id="otherCurrency" name="otherCurrency" size="30"></td>
                    </tr>
                    <tr>
						<th>نرخ تبادله</th>
						<td><input id="rate" name="rate" type="text" size="30" value="<?php echo preg_replace('/\b0\.00\b/', '', $this->GetExchangeRate()); ?>"></td>
					</tr>
                    <tr>
						<th>معادل به دالر</th>
						<td><input readonly id="to_dollar" name="to_dollar" type="text" size="30" value="<?php echo preg_replace('/\b0\.00\b/', '', $this->GetEqualToDollar()); ?>"></td>
					</tr>
                    <tr>
						<th>از درک</th>
						<td><textarea id="note" name="note" size="30"><?php echo $this->GetNote(); ?></textarea></td>
					</tr>
					<tr>
						<td colspan="3" style="text-align:center">
                        	<button id="update" type="submit">ایجاد تغییر</button>
                            <button id="cancel" type="button">لغو تغییر</button>
                        </td>
					</tr>
				</table>
			</form>
			<?php	
		}
		$editTransaction->free_result();
	}
	
	public function UpdateTransaction()
	{
		require_once "connection.php";
		
		$updateTransaction = $connection->prepare("update transactions set incoming = ?, outgoing = ?, currency = ?,
		exchange_rate = ?, equal_to_dollar = ?, note = ? where id = ?");
		
		$updateTransaction->bind_param("ddsddsi", $incoming, $outgoing, $currency, $exchangeRate, $equalToDollar, $note, $id);
		
		$id = $this->GetId();
		$incoming = $this->GetIncoming();
		$outgoing = $this->GetOutgoing();
		$currency = $this->GetCurrency();
		$exchangeRate = $this->GetExchangeRate();
		$equalToDollar = $this->GetEqualToDollar();
		$note = $this->GetNote();
		
		$updateTransaction->execute();
		$updateTransaction->free_result();
	}
	
	public function DeleteTransaction()
	{
		require_once "connection.php";
		
		$deleteTransaction = $connection->prepare("delete from transactions where id = ?");
		$deleteTransaction->bind_param("i", $id);
		
		$id=$this->GetId();
		
		$deleteTransaction->execute();
		$deleteTransaction->free_result();	
	}
}
/////////////////////////////////////////////////////////////////////////////////
class Capital extends Base
{
	public function AddCapital()
	{
		require_once "connection.php";
		require_once "jalaliDate.php"; // this class is use to change Gregorian date to jalali date
		$jalaliDate = new jDateTime(false, true, 'Asia/Kabul');
		$jDate = $jalaliDate->date("Y/m/d");
		
		$addCapital = $connection->prepare("insert into capitals (money, currency, exchange_rate, equal_to_dollar, created)
		values (?, ?, ?, ?, '$jDate')");
		$addCapital->bind_param("dsdd", $money, $currency, $exchangeRate, $equalToDollar);
		
		$money=$this->GetMoney();
		$currency= $this->GetCurrency();
		$exchangeRate= $this->GetExchangeRate();
		$equalToDollar=$this->GetEqualToDollar();
		$addCapital->execute();
		$addCapital->free_result();
	}
	
	public function DisplayCapital()
	{
		require "connection.php";
		
		$displayCapital = $connection->prepare("select * from capitals order by created asc");
		$displayCapital->execute();
		$displayCapital->store_result();
		$displayCapital->bind_result($id, $money, $currency, $exchangeRate, $equalToDollar, $created);
		
		$No = 1;
		while($displayCapital->fetch())
		{
			$this->SetId($id);
			$this->SetMoney($money);
			$this->SetCurrency($currency);
			$this->SetExchangeRate($exchangeRate);
			$this->SetEqualToDollar($equalToDollar);
			$this->SetCreated($created);
			?>
            <tr>
            	<td><?php echo $No; $No++ ?></td>
                <td class="numbers"><?php echo $this->GetMoney(); ?></td>
                <td style="font-weight:bold"><?php echo $this->GetCurrency(); ?></td>
                <td><?php echo $this->GetExchangeRate(); ?></td>
                <td class="numbers"><?php echo $this->GetEqualToDollar(); ?></td>
                <td><?php echo $this->GetCreated(); ?></td>
                <td class="noPrint userAccess" style="text-align:center">
                    <a target="_blank" href="editCapital.php?id=<?php echo $this->GetId(); ?>">ویرایش</a>&nbsp;&nbsp;&nbsp;
                    <a target="_blank" href="confirmCapitalDelete.php?id=<?php echo $this->GetId(); ?>">حذف</a>
                </td>
            </tr>
            <?php	
		}
	}
	
	// this function will return all currencies that exist in database for filtering
	public function SelectCurrency()
	{
		require_once "connection.php";
		
		$selectCurrency = $connection->prepare("select distinct currency from capitals");
		$selectCurrency->execute();
		$selectCurrency->store_result();
		$selectCurrency->bind_result($currency);
		while($selectCurrency->fetch())
		{
			$this->SetCurrency($currency);
			?>
            <option value="<?php echo $this->GetCurrency(); ?>"><?php echo $this->GetCurrency(); ?></option>
			<?php
		}
		$selectCurrency->free_result();
	}
	
	public function Profit()
	{
		require "connection.php";
		// by using limit 1,1 we can select second last row of table and it means this query
		// will always calculate the last two entry of table
		$profit = $connection->prepare("select
        (select coalesce(sum(equal_to_dollar), 0) from capitals group by created order by created desc limit 1)  as capital,
        
        (select coalesce(sum(incoming), 0) - coalesce(sum(outgoing), 0) from transactions where currency = 'دالر') +
		(select coalesce(sum(equal_to_dollar), 0) from transactions where incoming != 0 ) -
		(select coalesce(sum(equal_to_dollar), 0) from transactions where outgoing != 0 ) as total_transaction,
        
        (select coalesce(sum(incoming), 0) - coalesce(sum(outgoing), 0) from temporary_clients where currency = 'دالر') +
		(select coalesce(sum(equal_to_dollar), 0) from temporary_clients where incoming != 0 ) -
		(select coalesce(sum(equal_to_dollar), 0) from temporary_clients where outgoing != 0 ) as total_temp_client,
                
		(select coalesce(sum(outgoing), 0) - coalesce(sum(incoming), 0) from money_transmission where currency = 'دالر') +
		(select coalesce(sum(equal_to_dollar), 0) from money_transmission where outgoing != 0 ) -
		(select coalesce(sum(equal_to_dollar), 0) from money_transmission where incoming != 0 ) as total_transmission,
				
		(select capital - abs(coalesce(total_transaction + total_temp_client + total_transmission, 0))) as result");
		$profit->execute();
		$profit->store_result();
		$profit->bind_result($capital, $totalTransaction, $totalTempClient, $totalTransmission, $netCapital );
		
		$profit->fetch();
		
		$this->SetCapital($capital);
		$this->SetTotalTransaction($totalTransaction);
		$this->SetTotalTempClient($totalTempClient);
		$this->SetTotalTransmission($totalTransmission);
		$this->SetNetCapital($netCapital);
		
		echo "مجموع سرمایه : " . $this->GetCapital() . " | مجموع طلبات مردم : " . $this->GetTotalTransaction() . 
		" | مجموع حسابات متفرقه : " . $this->GetTotalTempClient() . " | مجموع حواله : " . $this->GetTotalTransmission() . 
		" | سرمایه خالص : " . $this->GetNetCapital();
	}
	
	public function EditCapital($Cid)
	{
		require_once "connection.php";
		
		$editCapital = $connection->prepare("select * from capitals where id = ?");
		$editCapital->bind_param("i", $id);
		
		$id = $Cid;
		
		$editCapital->execute();
		$editCapital->store_result();
		$editCapital->bind_result($id, $money, $currency, $exchangeRate, $equalToDollar, $created);	
		
		while($editCapital->fetch())
		{
			$this->SetId($id);
			$this->SetMoney($money);
			$this->SetCurrency($currency);
			$this->SetExchangeRate($exchangeRate);
			$this->SetEqualToDollar($equalToDollar);
			$this->SetCreated($created);
		?>
        <form action="../php/updateCapital.php" method="post">
				<table>
					<tr>
						<th>مقدار پول</th>
						<td><input class="numbers" id="money" name="money" type="text" size="30" value="<?php echo $this->GetMoney(); ?>" /></td>
					</tr>
					<tr>
						<th>واحد پول</th>
						<td>
                           <select id="currency" name="currency">
                           
                           <?php $cur = $this->GetCurrency();  echo "<option selected value='$cur'>$cur</option>" ?>
                             	<option value="دالر">دالر</option>
                                <option value="یورو">یورو</option>
                                <option value="پوند انگلیس">پوند انگلیس</option>
                                <option value="افغانی">افغانی</option>
                                <option value="روپیه">روپیه</option>
                                <option value="کلدار">کلدار</option>
                                <option value="تومان">تومان</option>
                                <option value="متفرقه">متفرقه</option>
                            </select>
                        </td>
					</tr>
                    <tr id="otherCurrency" hidden="">
                        <th><label for="otherCurrency">واحد پولی متفرقه</label></th>
                        <td><input type="text" id="otherCurrency" name="otherCurrency" size="30"></td>
                    </tr>
                    <tr>
						<th>نرخ تبادله</th>
						<td><input id="exchangeRate" name="exchangeRate" type="text" size="30" value="<?php echo preg_replace('/\b0\.00\b/', '', $this->GetExchangeRate()); ?>" /></td>
					</tr>
                    <tr>
						<th>معادل به دالر</th>
						<td><input readonly class="numbers" id="equalToDollar" name="equalToDollar" type="text" size="30" value="<?php echo preg_replace('/\b0\.00\b/', '', $this->GetEqualToDollar()); ?>" /></td>
					</tr>
					<tr>
						<td colspan="3" style="text-align:center">
                        	<button id="update" type="submit">ایجاد تغییر</button>
                            <button id="cancel" type="button">لغو تغییر</button>
                        </td>
					</tr>
				</table>
                <input type="hidden" id="id" name="id" value="<?php echo $this->GetId(); ?>" />
			</form>
			<?php	
		}
		$editCapital->free_result();
	}
	
	public function UpdateCapital()
	{
		require_once "connection.php";
		
		$updateCapital = $connection->prepare("update capitals set money = ?, currency = ?, exchange_rate = ?, equal_to_dollar = ?
		where id = ?");
		$updateCapital->bind_param("dsddi", $money, $currency, $exchangeRate, $equalToDollar, $id);
		
		$money = $this->GetMoney();
		$currency = $this->GetCurrency();
		$exchangeRate = $this->GetExchangeRate();
		$equalToDollar = $this->GetEqualToDollar();
		$id = $this->GetId();
				
		$updateCapital->execute();
		$updateCapital->free_result();
	}
	
	public function DeleteCapital()
	{
		require_once "connection.php";
		
		$deleteCapital = $connection->prepare("delete from capitals where id = ?");
		$deleteCapital->bind_param("i", $id);
		
		$id=$this->GetId();
		
		$deleteCapital->execute();
		$deleteCapital->free_result();		
	}
	
	public function CurrencyFilter()
	{
		require_once "connection.php";
		if ($this->GetCurrencyFilter() != "")
		{
			$filter = $connection->prepare("select * from capitals where currency = ? order by created asc");
			$filter->bind_param("s", $cur);
			$cur = $this->GetCurrencyFilter();
		}
		else
		{
			$filter = $connection->prepare("select * from capitals order by created asc");
		}
		$filter->execute();
		$filter->store_result();
		$filter->bind_result($id, $money, $currency, $exchangeRate, $equalToDollar, $created);
		$no = 1;
		while($filter->fetch())
		{
			$this->SetId($id);
			$this->SetMoney($money);
			$this->SetCurrency($currency);
			$this->SetExchangeRate($exchangeRate);
			$this->SetEqualToDollar($equalToDollar);
			$this->SetCreated($created);
		?>
        	<tr>
            	<td><?php echo $no; $no++ ?></td>
            	<td class="numbers"><?php echo $this->GetMoney();?></td>
                <td style="font-weight:bold"><?php echo $this->GetCurrency();?></td>
                <td><?php echo $this->GetExchangeRate();?></td>
                <td class="numbers"><?php echo $this->GetEqualToDollar();?></td>
                <td><?php echo $this->GetCreated();?></td>
                <td class="noPrint userAccess" style="text-align:center">
                    <a target="_blank" href="editCapital.php?id=<?php echo $this->GetId(); ?>">ویرایش</a>&nbsp;&nbsp;&nbsp;
                    <a target="_blank" href="confirmCapitalDelete.php?id=<?php echo $this->GetId(); ?>">حذف</a>
                </td>
            </tr>
        <?php	
		}
		$filter->free_result();
	}
	
	public function filterDate()
	{
		require_once "connection.php";
		
		if($this->GetFilterDate() != "")
		{
			$filter = $connection->prepare("select * from capitals where created = ? order by created asc");
			$filter->bind_param("s", $datee);
			$datee = $this->GetFilterDate();
		}
		else
		{
			$filter = $connection->prepare("select * from capitals order by created asc");
		}
		$filter->execute();
		$filter->store_result();
		$filter->bind_result($id, $money, $currency, $exchangeRate, $equalToDollar, $created);
		$no = 1;
		while($filter->fetch())
		{
			$this->SetId($id);
			$this->SetMoney($money);
			$this->SetCurrency($currency);
			$this->SetExchangeRate($exchangeRate);
			$this->SetEqualToDollar($equalToDollar);
			$this->SetCreated($created);
		?>
        	<tr>
            	<td><?php echo $no; $no++ ?></td>
            	<td class="numbers"><?php echo $this->GetMoney();?></td>
                <td style="font-weight:bold"><?php echo $this->GetCurrency();?></td>
                <td><?php echo $this->GetExchangeRate();?></td>
                <td class="numbers"><?php echo $this->GetEqualToDollar();?></td>
                <td><?php echo $this->GetCreated();?></td>
                <td class="noPrint userAccess" style="text-align:center">
                    <a target="_blank" href="editCapital.php?id=<?php echo $this->GetId(); ?>">ویرایش</a>&nbsp;&nbsp;&nbsp;
                    <a target="_blank" href="confirmCapitalDelete.php?id=<?php echo $this->GetId(); ?>">حذف</a>
                </td>
            </tr>
        <?php	
		}
		$filter->free_result();
	}
	
	public function DailyCapitalReport()
	{
		require_once "connection.php";
		
		if($this->GetStartDate() != "" && $this->GetEndDate() != "")
		{
			$capitalCalc = $connection->prepare("select c.created,c.capital,

			(select coalesce(sum(incoming), 0) - coalesce(sum(outgoing), 0) from transactions where currency = 'دالر') +
			(select coalesce(sum(equal_to_dollar), 0) from transactions where incoming != 0 ) -
			(select coalesce(sum(equal_to_dollar), 0) from transactions where outgoing != 0 ) as total_transaction,
		
			(select coalesce(sum(incoming), 0) - coalesce(sum(outgoing), 0) from temporary_clients where currency = 'دالر') +
			(select coalesce(sum(equal_to_dollar), 0) from temporary_clients where incoming != 0 ) -
			(select coalesce(sum(equal_to_dollar), 0) from temporary_clients where outgoing != 0 ) as total_temp_client,
		
			(select coalesce(sum(outgoing), 0) - coalesce(sum(incoming), 0) from money_transmission where currency = 'دالر') +
			(select coalesce(sum(equal_to_dollar), 0) from money_transmission where outgoing != 0 ) -
			(select coalesce(sum(equal_to_dollar), 0) from money_transmission where incoming != 0 ) as total_transmission,
		
			(select coalesce(total_transaction + total_temp_client + total_transmission, 0)) as total,
		
			(select capital - abs(coalesce(total_transaction + total_temp_client + total_transmission, 0))) as result
			
			from capitals
			
			JOIN (select coalesce(sum(equal_to_dollar), 0) as capital, created from capitals where created between ? and ? group by created ) c ON capitals.created = c.created
			group by created");
			$capitalCalc->bind_param("ss", $startDate, $endDate);
			
			$startDate = $this->GetStartDate();
			$endDate = $this->GetEndDate();
		}
		else
		{
			$capitalCalc = $connection->prepare("select c.created,c.capital,

			(select coalesce(sum(incoming), 0) - coalesce(sum(outgoing), 0) from transactions where currency = 'دالر') +
			(select coalesce(sum(equal_to_dollar), 0) from transactions where incoming != 0 ) -
			(select coalesce(sum(equal_to_dollar), 0) from transactions where outgoing != 0 ) as total_transaction,
		
			(select coalesce(sum(incoming), 0) - coalesce(sum(outgoing), 0) from temporary_clients where currency = 'دالر') +
			(select coalesce(sum(equal_to_dollar), 0) from temporary_clients where incoming != 0 ) -
			(select coalesce(sum(equal_to_dollar), 0) from temporary_clients where outgoing != 0 ) as total_temp_client,
		
			(select coalesce(sum(outgoing), 0) - coalesce(sum(incoming), 0) from money_transmission where currency = 'دالر') +
			(select coalesce(sum(equal_to_dollar), 0) from money_transmission where outgoing != 0 ) -
			(select coalesce(sum(equal_to_dollar), 0) from money_transmission where incoming != 0 ) as total_transmission,
		
			(select coalesce(total_transaction + total_temp_client + total_transmission, 0)) as total,
		
			(select capital - abs(coalesce(total_transaction + total_temp_client + total_transmission, 0))) as result
			
			from capitals
			
			JOIN (select coalesce(sum(equal_to_dollar), 0) as capital, created from capitals group by created ) c ON capitals.created = c.created
			group by created");
		}
		
		$capitalCalc->execute();
		$capitalCalc->store_result();
		$capitalCalc->bind_result($created, $capital, $totalTransaction, $totalTempClient, $totalTransmission, $total, $result);
		
		$no=1;
		while($capitalCalc->fetch())
		{
			$this->SetCreated($created);
			$this->SetCapital($capital);	
			$this->SetTotal($total);
			$this->SetNetCapital($result);
			?>
            <tr>
            	<td style="text-align:center"><?php echo $no; $no++?></td>
                <td class="numbers"><?php echo $this->GetCapital() . '$'; ?></td>
                <td class="numbers"><?php echo $this->GetTotal(); ?></td>
                <td class="numbers"><?php echo $this->GetNetCapital(); ?></td>
                <td><?php echo $this->GetCreated(); ?></td>
            </tr>
            <?php
		}
		$capitalCalc->free_result();
	}
}
/////////////////////////////////////////////////////////////////////////////////////
// this class is for transmission companies and mange all tasks about them
class TransmissionCompanies extends Base
{
	private $place;
	
	public function SetPlace($place)
	{
		$this->place=$place;	
	}
	public function GetPlace()
	{
		return $this->place;	
	}
	
	public function DisplayCompanies()
	{
		require_once "connection.php";
		
		if($this->GetSearchParameter() !== null && $this->GetSearchValue() !== null)
		{
			$searchParameter=$this->GetSearchParameter();
			
			$TransmissionCompany = $connection->prepare("SELECT t.*,	
				(select coalesce(sum(m.outgoing), 0) - coalesce(sum(m.incoming), 0) from money_transmission m where m.company_id = t.id and currency = 'دالر') +
				(select coalesce(sum(m.equal_to_dollar), 0) from money_transmission m where m.outgoing != 0  and m.company_id = t.id) -
				(select coalesce(sum(m.equal_to_dollar), 0) from money_transmission m where m.incoming != 0  and m.company_id = t.id) as total
				from transmission_companies t where {$searchParameter} LIKE ?;"
			);
			$TransmissionCompany->bind_param("s", $searchValue);
			$searchValue="%{$this->GetSearchValue()}%";
		}
		else
		{
			$TransmissionCompany = $connection->prepare("SELECT t.*,	
				(select coalesce(sum(m.outgoing), 0) - coalesce(sum(m.incoming), 0) from money_transmission m where m.company_id = t.id and currency = 'دالر') +
				(select coalesce(sum(m.equal_to_dollar), 0) from money_transmission m where m.outgoing != 0  and m.company_id = t.id) -
				(select coalesce(sum(m.equal_to_dollar), 0) from money_transmission m where m.incoming != 0  and m.company_id = t.id) as total
				from transmission_companies t;"
			);	
		}
		$TransmissionCompany->execute();
		$TransmissionCompany->store_result();
		$TransmissionCompany->bind_result($id, $name, $company, $place, $phone, $created, $total);
		$no = 1;
		while($TransmissionCompany->fetch())
		{
			$this->SetId($id);
			$this->SetName($name);
			$this->SetCompany($company);
			$this->SetPlace($place);
			$this->SetPhone($phone);
			$this->SetCreated($created);
			$this->SetTotal($total);
			?>
            <tr>
            	<td><?php echo $no;$no++ ?></td>
            	<td><a target="_blank" href="../FrontEnd/transmission.php?id=<?php echo $this->GetId(); ?>&name=<?php echo $this->GetCompany(); ?>"><?php echo $this->GetName(); ?></a></td>
                <td><?php echo $this->GetCompany(); ?></td>
                <td><?php echo $this->GetPlace(); ?></td>
                <td><?php echo $this->GetPhone(); ?></td>
                <td><?php echo $this->GetCreated(); ?></td>
                <td class="numbers"><?php echo $this->GetTotal(); ?></td>
                <td class="noPrint" style="text-align:center">
                	<a target="_blank" href="editTransmissionCompanies.php?id=<?php echo $this->GetId(); ?>&name=<?php echo $this->GetCompany(); ?>">ویرایش</a>&nbsp;&nbsp;&nbsp;
                    <a target="_blank" href="confirmCompanyDelete.php?id=<?php echo $this->GetId(); ?>&name=<?php echo $this->GetCompany(); ?>">حذف</a>
                </td>
            </tr>
            <?php
		}
		$TransmissionCompany->free_result();
	}
	
	public function newCompany()
	{
		require_once "connection.php";
		require_once "jalaliDate.php"; // this class is use to change Gregorian date to jalali date
		$jalaliDate = new jDateTime(false, true, 'Asia/Kabul');
		$jDate = $jalaliDate->date("Y/m/d");
		
		$newCompany = $connection->prepare("insert into transmission_companies (name, company, place, phone, created)
		values (?, ?, ?, ?, '$jDate')");
		$newCompany->bind_param("ssss", $name, $company, $place, $phone);
		
		$name = $this->GetName();
		$company = $this->GetCompany();
		$place = $this->GetPlace();
		$phone = $this->GetPhone();
		
		$newCompany->execute();
		$newCompany->free_result();
	}
	
	public function EditTransmissionCompany($id)
	{
		require_once("connection.php");	
		
		$edit = $connection->prepare("select * from transmission_companies where id = ?");
		$edit->bind_param("i", $clientId);
		$clientId = $id;
		
		$edit->execute();
		$edit->store_result();
		$edit->bind_result($id, $name, $company, $place, $phone, $created);

		while($edit->fetch())
		{
			$this->SetId($id);
			$this->SetName($name);
			$this->SetCompany($company);
			$this->SetPlace($place);
			$this->SetPhone($phone);
			?>
			<form action="../php/updateTransmissionCompany.php" method="post">
				<table>
					<tr>
						<th>آی دی</th>
						<td><input readonly id="id" name="id" type="text" size="30" value="<?php echo $this->GetId(); ?>"></td>
					</tr>
					<tr>
						<th>نام</th>
						<td><input id="name" name="name" type="text" size="30" value="<?php echo $this->GetName(); ?>"></td>
					</tr>
					<tr>
						<th>شرکت</th>
						<td><input id="company" name="company" type="text" size="30" value="<?php echo $this->GetCompany(); ?>"></td>
					</tr>
                    <tr>
						<th>مکان</th>
						<td><input id="place" name="place" type="text" size="30" value="<?php echo $this->GetPlace(); ?>"></td>
					</tr>
					<tr>
						<th>نمبر تماس</th>
						<td><input id="phone" name="phone" type="text" size="30" value="<?php echo $this->GetPhone(); ?>"></td>
					</tr>
					<tr>
						<td colspan="2" style="text-align:center"><button id="submit" type="submit">ایجاد تغییر</button> <button id="cancel" type="button">لغو تغییر</button></td>
					</tr>
				</table>
			</form>
			<?php
		}
		$edit->free_result();
	}
	
	public function UpdateTransmissionCompany()
	{
		require_once "connection.php";
		
		$update = $connection->prepare("update transmission_companies set name = ?, company = ?, place = ?, phone = ? where id = ?");
		$update->bind_param("ssssi", $name, $company, $place, $phone, $id);
		
		$name = $this->GetName();
		$company = $this->GetCompany();
		$place = $this->GetPlace();
		$phone = $this->GetPhone();
		$id = $this->GetId();
		
		$update->execute();
		$update->free_result();
	}
	
	public function DeleteTransmissionCompany()
	{
		require_once "connection.php";
		
		$deleteCompany = $connection->prepare("delete from transmission_companies where id = ?");
		$deleteCompany->bind_param("i", $id);
		$id = $this->GetId();
		
		$deleteCompany->execute();
		$deleteCompany->free_result();
	}
}

////////////////////////////////////////////////////////////////////////////////
class MoneyTransmission extends Base
{
	private $sender, $reciever, $transmissionNo, $senderLocation, $recieverLocation, $passed, $companyId;
	
	public function SetSender($sender)
	{
		$this->sender=$sender;	
	}
	public function GetSender()
	{
		return $this->sender;	
	}
	
	public function SetReciever($reciever)
	{
		$this->reciever=$reciever;	
	}
	public function GetReciever()
	{
		return $this->reciever;	
	}
	
	public function SetTransmissionNo($transmissionNo)
	{
		$this->transmissionNo=$transmissionNo;	
	}
	public function GetTransmissionNo()
	{
		return $this->transmissionNo;	
	}
	
	public function SetSenderLocation($senderLocation)
	{
		$this->senderLocation=$senderLocation;	
	}
	public function GetSenderLocation()
	{
		return $this->senderLocation;	
	}
	
	public function SetRecieverLocation($recieverLocation)
	{
		$this->recieverLocation=$recieverLocation;	
	}
	public function GetRecieverLocation()
	{
		return $this->recieverLocation;	
	}
	
	public function SetPassed($passed)
	{
		$this->passed=$passed;	
	}
	public function GetPassed()
	{
		return $this->passed;	
	}
	
	public function SetCompanyId($companyId)
	{
		$this->companyId=$companyId;	
	}
	public function GetCompanyId()
	{
		return $this->companyId;	
	}
	
	public function DisplayTransmission($Cid)
	{
		require "connection.php";
		
		if($this->GetSearchParameter() !== null && $this->GetSearchValue() !== null)
		{
			$searchParameter=$this->GetSearchParameter();
			// because like operator doen't work well with date values I check the search parameter
			// and if it is date I use equal operator
			if($searchParameter == "created")
			{
				if($this->GetSearchValue() != "")
				{
					$transmission = $connection->prepare("SELECT * from money_transmission where {$searchParameter} = ? and company_id = ?");
					$transmission->bind_param("si", $searchValue, $id);
					$searchValue=$this->GetSearchValue();
					$id = $Cid;
				}
				else
				{
					$transmission = $connection->prepare("SELECT * from money_transmission where company_id = ?");
					$transmission->bind_param("i", $id);
					$id = $Cid;	
				}
			}
			else
			{
				$transmission = $connection->prepare("SELECT * from money_transmission where {$searchParameter} LIKE ? and company_id = ?");
				$transmission->bind_param("si", $searchValue, $id);
				$searchValue="%{$this->GetSearchValue()}%";
				$id = $Cid;
			}		
		}
		else
		{
			$transmission = $connection->prepare("SELECT * from money_transmission where company_id = ?");
			$transmission->bind_param("i", $id);
			$id = $Cid;	
		}
		
		$transmission->execute();
		$transmission->store_result();
		$transmission->bind_result($id, $companyId, $sender, $reciever, $incoming, $outgoing, $currency, $exchangeRate, $equalToDollar,
		$transmissionNo, $senderLocation, $recieverLocation, $created, $passed);
		
		$no=1;
		while($transmission->fetch())
		{
			$this->SetId($id);
			$this->SetSender($sender);
			$this->SetReciever($reciever);
			$this->SetIncoming($incoming);
			$this->SetOutgoing($outgoing);
			$this->SetCurrency($currency);
			$this->SetExchangeRate($exchangeRate);
			$this->SetEqualToDollar($equalToDollar);
			$this->SetTransmissionNo($transmissionNo);
			$this->SetSenderLocation($senderLocation);
			$this->SetRecieverLocation($recieverLocation);
			$this->SetCreated($created);
			$this->SetPassed($passed);
			?>
            <tr>
            	<td><?php echo $no; $no++ ?></td>
            	<td><?php echo $this->GetSender(); ?></td>
                <td><?php echo $this->GetReciever(); ?></td>
                <td class="numbers"><?php echo preg_replace('/\b0\.00\b/', '',$this->GetIncoming()); ?></td>
                <td class="numbers"><?php echo preg_replace('/\b0\.00\b/', '',$this->GetOutgoing()); ?></td>
                <td><?php echo $this->GetCurrency(); ?></td>
                <td class="numbers"><?php echo preg_replace('/\b0\.00\b/', '',$this->GetExchangeRate()); ?></td>
                <td class="numbers"><?php echo preg_replace('/\b0\.00\b/', '',$this->GetEqualToDollar()); ?></td>
                <td><?php echo $this->GetTransmissionNo(); ?></td>
                <td><?php echo $this->GetSenderLocation(); ?></td>
                <td><?php echo $this->GetRecieverLocation(); ?></td>
                <?php 
				if($this->GetPassed() == 1)
                	echo "<td><input disabled type='checkbox' checked /></td>";
				else
					echo "<td><input disabled type='checkbox' /></td>";
                ?>
                <td><?php echo $this->GetCreated(); ?></td>
                <td class="noPrint userAccess">
                	<a target="_blank" href="editTransmission.php?id=<?php echo $this->GetId(); ?>" >ویرایش</a> -
                    <a target="_blank" href="confirmTransmissionDelete.php?id=<?php echo $this->GetId(); ?>" >حذف</a> 
                </td>
            </tr>
            <?php		
		}
		$transmission->free_result();
	}
	
	// this function will return all currencies that exist in database for filtering
	public function SelectCurrency($Cid)
	{
		require_once "connection.php";
		
		$selectCurrency = $connection->prepare("select distinct currency from money_transmission where company_id = ?");
		$selectCurrency->bind_param("i", $id);
		$id = $Cid;
		$selectCurrency->execute();
		$selectCurrency->store_result();
		$selectCurrency->bind_result($currency);
		while($selectCurrency->fetch())
		{
			$this->SetCurrency($currency);
			?>
            <option value="<?php echo $this->GetCurrency(); ?>"><?php echo $this->GetCurrency(); ?></option>
			<?php
		}
		$selectCurrency->free_result();
	}
	
	public function CurrencyFilter($Cid)
	{
		require_once "connection.php";
		
		if ($this->GetCurrencyFilter() != "")
		{
			$filter = $connection->prepare("SELECT * from money_transmission where currency = ? and company_id = ?");
			$filter->bind_param("si", $value, $id);
			$value = $this->GetCurrencyFilter();
			$id = $Cid;
		}
		else
		{
			$filter = $connection->prepare("select * from money_transmission where company_id = ?");
			$filter->bind_param("i", $id);
			$id = $Cid;
		}
		$filter->execute();
		$filter->store_result();
		$filter->bind_result($id, $companyId, $sender, $reciever, $incoming, $outgoing, $currency, $exchangeRate, $equalToDollar,
		$transmissionNo, $senderLocation, $recieverLocation, $created, $passed);
		
		$no=1;
		while($filter->fetch())
		{
			$this->SetId($id);
			$this->SetSender($sender);
			$this->SetReciever($reciever);
			$this->SetIncoming($incoming);
			$this->SetOutgoing($outgoing);
			$this->SetCurrency($currency);
			$this->SetExchangeRate($exchangeRate);
			$this->SetEqualToDollar($equalToDollar);
			$this->SetTransmissionNo($transmissionNo);
			$this->SetSenderLocation($senderLocation);
			$this->SetRecieverLocation($recieverLocation);
			$this->SetCreated($created);
			$this->SetPassed($passed);
			?>
            <tr>
            	<td><?php echo $no; $no++ ?></td>
            	<td><?php echo $this->GetSender(); ?></td>
                <td><?php echo $this->GetReciever(); ?></td>
                <td class="numbers"><?php echo preg_replace('/\b0\.00\b/', '',$this->GetIncoming()); ?></td>
                <td class="numbers"><?php echo preg_replace('/\b0\.00\b/', '',$this->GetOutgoing()); ?></td>
                <td><?php echo $this->GetCurrency(); ?></td>
                <td class="numbers"><?php echo preg_replace('/\b0\.00\b/', '',$this->GetExchangeRate()); ?></td>
                <td class="numbers"><?php echo preg_replace('/\b0\.00\b/', '',$this->GetEqualToDollar()); ?></td>
                <td><?php echo $this->GetTransmissionNo(); ?></td>
                <td><?php echo $this->GetSenderLocation(); ?></td>
                <td><?php echo $this->GetRecieverLocation(); ?></td>
                <?php 
				if($this->GetPassed() == 1)
                	echo "<td><input disabled type='checkbox' checked /></td>";
				else
					echo "<td><input disabled type='checkbox' /></td>";
                ?>
                <td><?php echo $this->GetCreated(); ?></td>
                <td class="noPrint userAccess">
                	<a target="_blank" href="editTransmission.php?id=<?php echo $this->GetId(); ?>" >ویرایش</a> -
                    <a target="_blank" href="confirmTransmissionDelete.php?id=<?php echo $this->GetId(); ?>" >حذف</a> 
                </td>
            </tr>
            <?php		
		}
		$filter->free_result();
	}
	
	public function NewTransmission()
	{
		require_once "connection.php";
		require_once "jalaliDate.php"; // this class is use to change Gregorian date to jalali date
		$jalaliDate = new jDateTime(false, true, 'Asia/Kabul');
		$jDate = $jalaliDate->date("Y/m/d");
		
		$newTransmission = $connection->prepare("insert into money_transmission (company_id, sender, reciever, incoming, outgoing, currency,
		exchange_rate, equal_to_dollar, transmission_no, sender_location, reciever_location, created, passed)
		values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, '$jDate', ?)");
		
		$newTransmission->bind_param("issddsddssss", $companyId, $sender, $reciever, $incoming, $outgoing, $currency, $exchangeRate,
		$equalToDollar,	$transmissionNo, $senderLocation, $recieverLocation, $passed);
		
		$companyId = $this->GetCompanyId();
		$sender = $this->GetSender();
		$reciever = $this->GetReciever();
		$incoming = $this->GetIncoming();
		$outgoing = $this->GetOutgoing();
		$currency = $this->GetCurrency();
		$exchangeRate = $this->GetExchangeRate();
		$equalToDollar = $this->GetEqualToDollar();
		$transmissionNo = $this->GetTransmissionNo();
		$senderLocation = $this->GetSenderLocation();
		$recieverLocation = $this->GetRecieverLocation();
		$passed = $this->GetPassed();
		
		$newTransmission->execute();
		$newTransmission->free_result();
	}
	
	public function TransmissionTotalCurrency($Cid)
	{
		require "connection.php";
		$totalCurrency=$connection->prepare("select currency, (coalesce(sum(outgoing), 0) - coalesce(sum(incoming), 0)) as currencyTotal
		from money_transmission where company_id = ? group by currency");
		$totalCurrency->bind_param("i", $id);
		$id = $Cid;
		$totalCurrency->execute();
		$totalCurrency->store_result();
		$totalCurrency->bind_result($currency, $currencyTotal);
		
		while($totalCurrency->fetch())
		{
			$this->SetCurrency($currency);
			$this->SetCurrencyTotal($currencyTotal);

				echo $this->GetCurrency() . '  :  ' . $this->GetCurrencyTotal() . '  |  '; 	
			
		}	
		$totalCurrency->free_result();
	}
	
	public function EditTransmission ($id)
	{
		require_once "connection.php";
		
		$editTransmission = $connection->prepare("select * from money_transmission where id = ?");
		$editTransmission->bind_param("i", $Tid);
		$Tid = $id;
		$editTransmission->execute();
		$editTransmission->store_result();
		$editTransmission->bind_result($id, $companyId, $sender, $reciever, $incoming, $outgoing, $currency, $exchangeRate, $equalToDollar,
		$transmissionNo, $senderLocation, $recieverLocation, $created, $passed);
		
		$no=1;
		while($editTransmission->fetch())
		{
			$this->SetId($id);
			$this->SetSender($sender);
			$this->SetReciever($reciever);
			$this->SetIncoming($incoming);
			$this->SetOutgoing($outgoing);
			$this->SetCurrency($currency);
			$this->SetExchangeRate($exchangeRate);
			$this->SetEqualToDollar($equalToDollar);
			$this->SetTransmissionNo($transmissionNo);
			$this->SetSenderLocation($senderLocation);
			$this->SetRecieverLocation($recieverLocation);
			$this->SetPassed($passed);
			?>
            <form action="../PHP/updateTransmission.php" method="post">
                <table align="center">
                    <tr>
                        <th><label for="sender">فرستنده</label></th>
                        <td><input type="text" id="sender" name="sender" size="30" value="<?php echo $this->GetSender(); ?>" /></td>
                    </tr>
                    <tr>
                        <th><label for="reciever">گیرنده</label></th>
                        <td><input type="text" id="reciever" name="reciever" size="30" value="<?php echo $this->GetReciever(); ?>" /></td>
                    </tr>
                    <tr>
                        <th><label for="outgoing">ارسال حواله</label></th>
                        <td><input type="text" id="outgoing" name="outgoing" size="30" value="<?php echo preg_replace('/\b0\.00\b/', '', $this->GetOutgoing()); ?>" /></td>
                    </tr>
                    
                    <tr>
                        <th><label for="incoming">دریافت حواله</label></th>
                        <td><input type="text" id="incoming" name="incoming" size="30" value="<?php echo preg_replace('/\b0\.00\b/', '', $this->GetIncoming()); ?>" /></td>
                    </tr>
                    <tr>
                        <th><label for="currency">واحد پول</label></th>
                        <td>
                            <select id="currency" name="currency">
                            	<?php $cur = $this->GetCurrency();  echo "<option selected value='$cur'>$cur</option>" ?>
                                <option value="دالر">دالر</option>
                                <option value="یورو">یورو</option>
                                <option value="افغانی">افغانی</option>
                                <option value="کلدار">کلدار</option>
                                <option value="متفرقه">متفرقه</option>
                            </select>
                        </td>
                    </tr>
                    <tr id="otherCurrency" hidden="">
                        <th><label for="otherCurrency">واحد پولی متفرقه</label></th>
                        <td><input type="text" id="otherCurrency" name="otherCurrency" size="30"></td>
                    </tr>
                    <tr>
                        <th><label for="exchangeRate">نرخ تبادله</label></th>
                        <td><input type="text" id="exchangeRate" name="exchangeRate" size="30" value="<?php echo preg_replace('/\b0\.00\b/', '', $this->GetExchangeRate()); ?>" /></td>
                    </tr>
                    <tr>
                        <th><label for="equalToDollar">معادل به دالر</label></th>
                        <td><input readonly type="text" id="equalToDollar" name="equalToDollar" size="30" value="<?php echo preg_replace('/\b0\.00\b/', '', $this->GetEqualToDollar()); ?>" /></td>
                    </tr>
                     <tr>
                        <th><label for="transmissionNumber">نمبر حواله</label></th>
                        <td><input type="text" id="transmissionNumber" name="transmissionNumber" size="30" value="<?php echo $this->GetTransmissionNo(); ?>" /></td>
                    </tr>
                    <tr>
                        <th><label for="senderLocation">محل ارسال</label></th>
                        <td><input  type="text" id="senderLocation" name="senderLocation" size="30" value="<?php echo $this->GetSenderLocation(); ?>" /></td>
                    </tr>
                    <tr>
                        <th><label for="recieverLocation">محل دریافت</label></th>
                        <td><input type="text" id="recieverLocation" name="recieverLocation" size="30" value="<?php echo $this->GetRecieverLocation(); ?>" /></td>
                    </tr>
                    <tr>
                        <th><label for="passed">تسلیم شد</label></th>
                        <?php 
							if($this->GetPassed() == 1)
							{
								echo "<td><input  type='checkbox' id='passed' name='passed' value='1' checked /></td>";
								echo "<input hidden='' name='passed' value='0' />";
							}
							else
							{	
								echo "<td><input  type='checkbox' id='passed' name='passed' value='1' /></td>";
								echo "<input hidden='' name='passed' value='0' />";
							}
						?>
                        
                            
                    </tr>
                    <tr>
                        <td colspan="3" style="text-align:center">
                            <button id="submit" type="submit">ثبت</button>
                            <button id="cancel" type="button">لغو</button>
                        </td>
                    </tr>
                    <input type="hidden" id="id" name="id" value="<?php echo $this->GetId(); ?>" />
                </table>
            </form>
            <?php
		}
		$editTransmission->free_result();
	}
	
	public function UpdateTransmission()
	{
		require_once "connection.php";
		
		$update = $connection->prepare("update money_transmission set sender = ?, reciever = ?, incoming = ?, outgoing = ?,
		currency = ?, exchange_rate = ?, equal_to_dollar = ?, transmission_no = ?, sender_location = ?, reciever_location = ?,
		passed = ? where id = ?");
		
		$update->bind_param("ssddsddssssi", $sender, $reciever, $incoming, $outgoing, $currency, $exchangeRate, $equalToDollar,
		$transmissionNo, $senderLocation, $recieverLocation, $passed, $id);
		
		$sender = $this->GetSender();
		$reciever = $this->GetReciever();
		$incoming = $this->GetIncoming();
		$outgoing = $this->GetOutgoing();
		$currency = $this->GetCurrency();
		$exchangeRate = $this->GetExchangeRate();
		$equalToDollar = $this->GetEqualToDollar();
		$transmissionNo = $this->GetTransmissionNo();
		$senderLocation = $this->GetSenderLocation();
		$recieverLocation = $this->GetRecieverLocation();
		$passed = $this->GetPassed();
		$id = $this->GetId();
		
		$update->execute();
		$update->free_result();
	}
	
	public function DeleteTransmission()
	{
		require_once "connection.php";
		
		$deleteTransmission = $connection->prepare("delete from money_transmission where id = ?");
		$deleteTransmission->bind_param("i", $id);
		
		$id=$this->GetId();
		
		$deleteTransmission->execute();
		$deleteTransmission->free_result();		
		
	}
}
?>