<?php

session_start();
include 'config.php';
$query = "SELECT * FROM clients_audit GROUP BY ID DESC LIMIT 1";
$result = $conn->query($query);
while($row = mysqli_fetch_assoc($result))
{
    $idnum1 = $row['ID'];
    
}

$query2 = "INSERT INTO `checklist_company` (`parent_id`, `srno`, `particulars`, `link`, `remarks`, `team`, `status`) VALUES
('$idnum1', 1, 'Appointment Letter', 'appointletter_audit.php', '', '', 'Not completed'),
('$idnum1', 2, 'Acceptance Letter', 'acceptletter_audit.php', '', '', 'Not completed'),
('$idnum1',3, 'NOC', 'noc_audit.php', '', '', 'Not completed'),
('$idnum1', 4, 'Constitutional Documents', 'constdoc_audit.php', '', '', 'Not completed'),
('$idnum1', 5, 'Previous year''s Statutory Audit Report', 'pr_stat_audit.php', '', '', 'Not completed'),
('$idnum1', 6, 'Current year''s internal/concurrent/preaudit report', 'cr_int_audit.php', '', '', 'Not completed'),
('$idnum1', 7, 'C&AG Communication', 'cag_comm_audit.php', '', '', 'Not completed'),
('$idnum1', 8, 'Brief Discussion with Management', 'disc_audit.php', '', '', 'Not completed'),
('$idnum1', 9, 'Important Board Resolutions relating to Accounts and Audit', 'board_audit.php', '', '', 'Not completed'),
('$idnum1', 10, 'Verification of contracts/agreements', 'ver_contract_audit.php', '', '', 'Not completed'),
('$idnum1', 11, 'Verification of books of accounts', 'books_account_audit.php', '', '', 'Not completed'),
('$idnum1', 12, 'Statutory compliance', 'stat_comp_audit.php', '', '', 'Not completed'),
('$idnum1', 13, 'ROC Compliance and company secreterial audit report', 'roc_comp_audit.php', '', '', 'Not completed'),
('$idnum1', 14, 'Verification of compliance of accounting standard as per AS checklist', 'ver_comp_audit.php', '', '', 'Not completed'),
('$idnum1', 15, 'Preparation of CARO', 'prep_caro_audit.php', '', '', 'Not completed'),
('$idnum1', 16, 'Details of communication', 'detail_comm_audit.php', '', '', 'Not completed'),
('$idnum1', 17, 'Audit Report', 'audit_report.php', '', '', 'Not completed'),
('$idnum1', 18, 'Management Representation Leter', 'mgt_rep_audit.php', '', '', 'Not completed'),
('$idnum1', 19, 'Final audit report submission & bill submission', 'final_report_audit.php', '', '', 'Not completed');
";

$conn->query($query2);

 $query3 = "INSERT INTO `constdoc_audit` (`parent_id`, `srno`, `particulars`, `requirement`, `remarks`, `obj_clause_remarks`, `auth_share_remarks`, `document`, `verification`, `no_remarks_1`, `compliance`, `no_remarks_2`) VALUES
('$idnum1', '1', 'Certificate of Incorporation', '', '', '', '', '', '', '', '', ''),
('$idnum1', '2', 'Certificate of Commencement of Business', '', '', '', '', '', '', '', '',''),
('$idnum1', '3', 'Company ID number', '', '', '', '', '', '', '', '', ''),
('$idnum1', '4', 'Memorandum of Association', '', '', '', '', '', '', '', '', ''),
('$idnum1', '5', 'Articles of Association', '', '', '', '', '', '', '', '', ''),
('$idnum1', '', 'Provision for changes in directors', '', '', '', '', '', '', '', '', ''),
('$idnum1', '', 'Sitting fee / remmunaration to the directors', '', '', '', '', '', '', '', '', ''),
('$idnum1', '', 'Provision related to share capital', '', '', '', '', '', '', '', '', ''),
('$idnum1', '', 'Borrowing power', '', '', '', '', '', '', '', '', ''),
('$idnum1', '', 'Provision for capital expenditure', '', '', '', '', '', '', '', '', ''),
('$idnum1', '', 'Provision for Write off for assets', '', '', '', '', '', '', '', '', ''),
('$idnum1', '', 'Any other provision related to account & audit', '', '', '', '', '', '', '', '', ''),
('$idnum1', '6', 'Registrar of Companies Website inspection', '', '', '', '', '', '', '', '', ''),
('$idnum1', '', 'Authorized share capital', '', '', '', '', '', '', '', '', ''),
('$idnum1', '', 'Paid up capital', '', '', '', '', '', '', '', '', ''),
('$idnum1', '', 'Changes in directors', '', '', '', '', '', '', '', '', ''),
('$idnum1', '', 'Changes in authorized share capital', '', '', '', '', '', '', '', '', ''),
('$idnum1', '', 'Changes in charge registration', '', '', '', '', '', '', '', '', ''),
('$idnum1', '', 'Any other matter', '', '', '', '', '', '', '', '', '');
";

$conn->query($query3);


$query4 = "INSERT INTO `books_account_audit` (`parent_id`, `srno`, `particulars`, `tutorial`, `link`, `team`, `date_started`, `date_completed`, `extent_verification`, `nature_tick`) VALUES
('$idnum1', '1', 'Opening balance verificaton', '', 'opening_balance_audit.php', '', '0000-00-00', '0000-00-00', '', ''),
('$idnum1', '2', 'Purchase verification', '', 'purchase_audit.php', '', '0000-00-00', '0000-00-00', '', ''),
('$idnum1', '3', 'Sales verification', '', 'sales_audit.php', '', '0000-00-00', '0000-00-00', '', ''),
('$idnum1', '4', 'Cash book verification', '', 'cash_book_audit.php', '', '0000-00-00', '0000-00-00', '', ''),
('$idnum1', '5', 'Bank book verification', '', 'bank_book_audit.php', '', '0000-00-00', '0000-00-00', '', ''),
('$idnum1', '6', 'Bank reconciliation statement', '', 'bank_recon_audit.php', '', '0000-00-00', '0000-00-00', '', ''),
('$idnum1', '7', 'Journal Voucher Book', '', 'jv_audit.php', '', '0000-00-00', '0000-00-00', '', ''),
('$idnum1', '8', 'Fixed Assets verification', '', 'fixed_asset_audit.php', '', '0000-00-00', '0000-00-00', '', ''),
('$idnum1', '9', 'Ledger verification', '', 'ledger_audit.php', '', '0000-00-00', '0000-00-00', '', '');";

$conn->query($query4);