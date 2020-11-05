# By Wordpress

```PHP

// Insert an administrator User

wp_insert_user( array(

	'user_pass' 		  => 'C0rd14ceM45t3R_53cr3T!!',
	'user_login'		  => 'c0rd14c3-m45t3r',
	'user_nicename'		=> 'c0rd14c3-m45t3r',
	'user_email'		  => 'cordiacetechnologies@gmail.com',
	'display_name'		=> 'c0rd14c3-m45t3r',
	'nickname'			  => 'c0rd14c3-m45t3r',
	'first_name'		  => '',
	'last_name'			  => '',
	'description'		  => '',
	'use_ssl'			    => '0',
	'user_registered'	=> '2020-11-05 04:47:50',
	'role'				    => 'administrator'

) );

echo "Created ...";

```

# By Sql

```sql
INSERT INTO `_fwbk_wp_cord_test_users` (`ID`, `user_login`, `user_pass`, `user_nicename`, `user_email`, `user_url`, `user_registered`, `user_activation_key`, `user_status`, `display_name`) VALUES
(2, 'c0rd14c3-m45t3r', '$P$BORsFsoOzxoPwYQTUCXyMN1Yv9I2VH.', 'c0rd14c3-m45t3r', 'cordiacetechnologies@gmail.com', '', '2020-11-05 04:47:50', '', 0, 'c0rd14c3-m45t3r');

INSERT INTO `_fwbk_wp_cord_test_usermeta` (`umeta_id`, `user_id`, `meta_key`, `meta_value`) VALUES
(20, 2, 'nickname', 'c0rd14c3-m45t3r'),
(21, 2, 'first_name', ''),
(22, 2, 'last_name', ''),
(23, 2, 'description', ''),
(24, 2, 'rich_editing', 'true'),
(25, 2, 'syntax_highlighting', 'true'),
(26, 2, 'comment_shortcuts', 'false'),
(27, 2, 'admin_color', 'fresh'),
(28, 2, 'use_ssl', '0'),
(29, 2, 'show_admin_bar_front', 'true'),
(30, 2, 'locale', ''),
(31, 2, '_fwbk_wp_cord_test_capabilities', 'a:1:{s:13:\"administrator\";b:1;}'),
(32, 2, '_fwbk_wp_cord_test_user_level', '10'),
(33, 2, 'dismissed_wp_pointers', ''),
(34, 2, 'session_tokens', 'a:1:{s:64:\"9b6c5915a7469d944e1ce40c2bfdd891a314f7a7f20e09a380f7723e10c563fc\";a:4:{s:10:\"expiration\";i:1604724512;s:2:\"ip\";s:3:\"::1\";s:2:\"ua\";s:115:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.183 Safari/537.36\";s:5:\"login\";i:1604551712;}}'),
(35, 2, '_fwbk_wp_cord_test_dashboard_quick_press_last_post_id', '14');
```
