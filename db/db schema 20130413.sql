SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `mgdb_dev` ;
CREATE SCHEMA IF NOT EXISTS `mgdb_dev` DEFAULT CHARACTER SET utf8 ;
USE `mgdb_dev` ;

-- -----------------------------------------------------
-- Table `mgdb_dev`.`category`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mgdb_dev`.`category` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `title` VARCHAR(25) NULL DEFAULT NULL ,
  `slug` VARCHAR(7) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `category_id_UNIQUE` (`id` ASC) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mgdb_dev`.`clerk_group_permissions`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mgdb_dev`.`clerk_group_permissions` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `slug` VARCHAR(45) NULL DEFAULT NULL ,
  `title` VARCHAR(200) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mgdb_dev`.`clerk_groups`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mgdb_dev`.`clerk_groups` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `title` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `clerk_group_id_UNIQUE` (`id` ASC) ,
  UNIQUE INDEX `title_UNIQUE` (`title` ASC) )
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mgdb_dev`.`clerk_group_permissions_assign`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mgdb_dev`.`clerk_group_permissions_assign` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `clerk_group_id` INT(11) UNSIGNED NOT NULL ,
  `clerk_group_permissions_id` INT(11) UNSIGNED NOT NULL ,
  `allow` INT(1) UNSIGNED NULL DEFAULT NULL ,
  `deny` INT(1) UNSIGNED NULL DEFAULT NULL ,
  PRIMARY KEY (`id`, `clerk_group_id`, `clerk_group_permissions_id`) ,
  INDEX `fk_clerk_group_permissions_assign_clerk_groups1_idx` (`clerk_group_id` ASC) ,
  INDEX `fk_clerk_group_permissions_assign_clerk_group_permissions1_idx` (`clerk_group_permissions_id` ASC) ,
  CONSTRAINT `fk_clerk_group_permissions_assign_clerk_groups1`
    FOREIGN KEY (`clerk_group_id` )
    REFERENCES `mgdb_dev`.`clerk_groups` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_clerk_group_permissions_assign_clerk_group_permissions1`
    FOREIGN KEY (`clerk_group_permissions_id` )
    REFERENCES `mgdb_dev`.`clerk_group_permissions` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mgdb_dev`.`clerks`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mgdb_dev`.`clerks` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `clerk_group_id` INT(11) UNSIGNED NOT NULL ,
  `code` VARCHAR(6) NOT NULL ,
  `name` VARCHAR(100) NOT NULL DEFAULT 'No Name' ,
  `password_hash` VARCHAR(128) NOT NULL ,
  `password_salt` VARCHAR(32) NOT NULL ,
  `date_created` DATETIME NOT NULL ,
  `date_last_login` DATETIME NULL DEFAULT NULL ,
  `deleted` INT(1) UNSIGNED NOT NULL DEFAULT '0' ,
  PRIMARY KEY (`id`, `clerk_group_id`) ,
  UNIQUE INDEX `clerk_id_UNIQUE` (`id` ASC) ,
  INDEX `fk_clerks_clerk_groups1_idx` (`clerk_group_id` ASC) ,
  INDEX `clerks_code_idx` (`code` ASC) ,
  INDEX `clerks_name_idx` (`name` ASC) ,
  CONSTRAINT `fk_clerks_clerk_groups1`
    FOREIGN KEY (`clerk_group_id` )
    REFERENCES `mgdb_dev`.`clerk_groups` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 19
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mgdb_dev`.`group_types`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mgdb_dev`.`group_types` (
  `id` INT(11) UNSIGNED NOT NULL ,
  `title` VARCHAR(150) NOT NULL ,
  `disabled` INT(1) UNSIGNED NOT NULL DEFAULT '0' ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mgdb_dev`.`groups`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mgdb_dev`.`groups` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `admin_customer_id` INT(11) UNSIGNED NOT NULL ,
  `group_type_id` INT(11) UNSIGNED NOT NULL ,
  `name` VARCHAR(250) NOT NULL DEFAULT 'No Name Supplied' ,
  `phone` VARCHAR(12) NULL DEFAULT NULL ,
  `fax` VARCHAR(12) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`, `admin_customer_id`, `group_type_id`) ,
  UNIQUE INDEX `group_id_UNIQUE` (`id` ASC) ,
  INDEX `fk_groups_customers1_idx` (`admin_customer_id` ASC) ,
  INDEX `groups_name_idx` (`name` ASC) ,
  INDEX `fk_groups_group_types1_idx` (`group_type_id` ASC) ,
  CONSTRAINT `fk_groups_customers1`
    FOREIGN KEY (`admin_customer_id` )
    REFERENCES `mgdb_dev`.`customers` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_groups_group_types1`
    FOREIGN KEY (`group_type_id` )
    REFERENCES `mgdb_dev`.`group_types` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mgdb_dev`.`customers`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mgdb_dev`.`customers` (
  `id` INT(11) UNSIGNED NOT NULL ,
  `group_id` INT(11) UNSIGNED NOT NULL ,
  `first_name` VARCHAR(20) NULL DEFAULT NULL ,
  `last_name` VARCHAR(30) NULL DEFAULT NULL ,
  `address1` VARCHAR(45) NULL DEFAULT NULL ,
  `address2` VARCHAR(45) NULL DEFAULT NULL ,
  `city` VARCHAR(50) NULL DEFAULT NULL ,
  `state` VARCHAR(20) NULL DEFAULT NULL ,
  `zip` VARCHAR(10) NULL DEFAULT NULL ,
  `phone` VARCHAR(12) NULL DEFAULT NULL ,
  `fax` VARCHAR(12) NULL DEFAULT NULL ,
  `email` VARCHAR(60) NULL DEFAULT NULL ,
  `notes` BLOB NULL DEFAULT NULL ,
  `company` VARCHAR(250) NULL DEFAULT NULL ,
  `credit_card` VARCHAR(20) NULL DEFAULT NULL ,
  `credit_card_exp` DATETIME NULL DEFAULT NULL ,
  `cvv` VARCHAR(11) NULL DEFAULT NULL ,
  `default_tax_exempt` INT(1) NOT NULL DEFAULT '0' ,
  `created_date` DATETIME NULL DEFAULT NULL ,
  `last_activity_date` DATETIME NULL DEFAULT NULL ,
  `last_update_date` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `customer_id_UNIQUE` (`id` ASC) ,
  INDEX `fk_customers_groups1_idx` (`group_id` ASC) ,
  INDEX `customers_full_name_idx` (`last_name` ASC, `first_name` ASC) ,
  INDEX `customers_last_name_ids` (`last_name` ASC) ,
  INDEX `customers_first_name_idx` (`first_name` ASC) ,
  CONSTRAINT `fk_customers_groups1`
    FOREIGN KEY (`group_id` )
    REFERENCES `mgdb_dev`.`groups` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mgdb_dev`.`deposit_methods`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mgdb_dev`.`deposit_methods` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `title` VARCHAR(45) NOT NULL ,
  `disabled` INT(1) UNSIGNED NOT NULL DEFAULT '0' ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `deposit_method_id_UNIQUE` (`id` ASC) )
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mgdb_dev`.`vendors`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mgdb_dev`.`vendors` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `code` VARCHAR(50) NULL DEFAULT NULL ,
  `name` VARCHAR(100) NULL DEFAULT NULL ,
  `contact` VARCHAR(20) NULL DEFAULT NULL ,
  `address1` VARCHAR(30) NULL DEFAULT NULL ,
  `address2` VARCHAR(30) NULL DEFAULT NULL ,
  `city_state` VARCHAR(120) NULL DEFAULT NULL ,
  `city` VARCHAR(100) NULL DEFAULT NULL ,
  `state` VARCHAR(100) NULL DEFAULT NULL ,
  `zip` VARCHAR(10) NULL DEFAULT NULL ,
  `phone` VARCHAR(14) NULL DEFAULT NULL ,
  `fax` VARCHAR(14) NULL DEFAULT NULL ,
  `email` VARCHAR(100) NULL DEFAULT NULL ,
  `mg_account_num` VARCHAR(250) NULL DEFAULT NULL ,
  `sales_rep_name` VARCHAR(250) NULL DEFAULT NULL ,
  `sales_rep_phone` VARCHAR(250) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `vendor_id_UNIQUE` (`id` ASC) ,
  INDEX `vendors_code_idx` (`code` ASC) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mgdb_dev`.`inventory`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mgdb_dev`.`inventory` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `category_id` INT(11) UNSIGNED NOT NULL ,
  `vendor_id` INT(11) UNSIGNED NOT NULL ,
  `sku` VARCHAR(16) NULL DEFAULT NULL ,
  `description` VARCHAR(500) NULL DEFAULT NULL ,
  `short_description` VARCHAR(200) NULL DEFAULT NULL COMMENT 'A trigger auto populates this field (used for an indexable description)' ,
  `quantity` INT(5) NOT NULL DEFAULT '0' ,
  `last_cost` DECIMAL(4,2) NULL DEFAULT NULL ,
  `price` DECIMAL(4,2) NOT NULL DEFAULT '0.00' ,
  `vendor_stock` VARCHAR(50) NULL DEFAULT NULL ,
  `size_id` INT(20) NULL DEFAULT NULL ,
  `min_quantity` INT(5) NULL DEFAULT '0' ,
  `do_not_order` INT(1) UNSIGNED NULL DEFAULT '0' ,
  `online` INT(1) UNSIGNED NULL DEFAULT '0' ,
  PRIMARY KEY (`id`, `category_id`, `vendor_id`) ,
  UNIQUE INDEX `inventory_id_UNIQUE` (`id` ASC) ,
  INDEX `fk_inventory_vendors1_idx` (`vendor_id` ASC) ,
  INDEX `fk_inventory_category1_idx` (`category_id` ASC) ,
  INDEX `inventory_sku_idx` (`sku` ASC) ,
  INDEX `inventory_description_idx` (`short_description` ASC) ,
  INDEX `inventory_vendor_stock_idx` (`vendor_stock` ASC) ,
  INDEX `inventory_online_idx` (`online` ASC) ,
  CONSTRAINT `fk_inventory_category1`
    FOREIGN KEY (`category_id` )
    REFERENCES `mgdb_dev`.`category` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_inventory_vendors1`
    FOREIGN KEY (`vendor_id` )
    REFERENCES `mgdb_dev`.`vendors` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mgdb_dev`.`inventory_pieces`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mgdb_dev`.`inventory_pieces` (
  `id` INT(11) UNSIGNED NOT NULL ,
  `inventory_id` INT(11) UNSIGNED NOT NULL ,
  `title` VARCHAR(300) NOT NULL ,
  `disabled` INT(1) UNSIGNED NOT NULL DEFAULT '0' ,
  PRIMARY KEY (`id`, `inventory_id`) ,
  INDEX `fk_inventory_pieces_inventory1_idx` (`inventory_id` ASC) ,
  CONSTRAINT `fk_inventory_pieces_inventory1`
    FOREIGN KEY (`inventory_id` )
    REFERENCES `mgdb_dev`.`inventory` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mgdb_dev`.`invoice_status`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mgdb_dev`.`invoice_status` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `title` VARCHAR(45) NOT NULL ,
  `closed` INT(1) NOT NULL DEFAULT '0' ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `title_UNIQUE` (`title` ASC) ,
  UNIQUE INDEX `invoice_status_id_UNIQUE` (`id` ASC) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mgdb_dev`.`invoices`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mgdb_dev`.`invoices` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `clerk_id` INT(11) UNSIGNED NOT NULL ,
  `customer_id` INT(11) UNSIGNED NOT NULL ,
  `invoice_status_id` INT(11) UNSIGNED NOT NULL ,
  `transaction_date` DATETIME NOT NULL ,
  `sale_total` DECIMAL(5,2) NOT NULL ,
  `tax` DECIMAL(5,2) NULL DEFAULT NULL ,
  `balance_due` VARCHAR(45) NOT NULL ,
  `rent_dep` DECIMAL(5,2) NULL DEFAULT NULL ,
  `deposit_method_id` INT(11) UNSIGNED NOT NULL ,
  `deposit_card` VARCHAR(40) NULL DEFAULT NULL ,
  `deposit_card_exp` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`id`, `clerk_id`, `customer_id`, `invoice_status_id`) ,
  UNIQUE INDEX `invoice_id_UNIQUE` (`id` ASC) ,
  INDEX `fk_invoices_clerks1_idx` (`clerk_id` ASC) ,
  INDEX `fk_invoices_invoice_status1_idx` (`invoice_status_id` ASC) ,
  INDEX `fk_invoices_deposit_methods1_idx` (`deposit_method_id` ASC) ,
  INDEX `fk_invoices_customers1_idx` (`customer_id` ASC) ,
  INDEX `invoices_transaction_date_idx` (`transaction_date` ASC) ,
  CONSTRAINT `fk_invoices_clerks1`
    FOREIGN KEY (`clerk_id` )
    REFERENCES `mgdb_dev`.`clerks` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_invoices_customers1`
    FOREIGN KEY (`customer_id` )
    REFERENCES `mgdb_dev`.`customers` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_invoices_deposit_methods1`
    FOREIGN KEY (`deposit_method_id` )
    REFERENCES `mgdb_dev`.`deposit_methods` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_invoices_invoice_status1`
    FOREIGN KEY (`invoice_status_id` )
    REFERENCES `mgdb_dev`.`invoice_status` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mgdb_dev`.`invoice_items`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mgdb_dev`.`invoice_items` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `invoice_id` INT(11) UNSIGNED NOT NULL ,
  `inventory_id` INT(11) UNSIGNED NOT NULL ,
  `price` DECIMAL(7,2) NULL DEFAULT '0.00' ,
  `rental_rate` DECIMAL(7,2) NULL DEFAULT NULL ,
  `discount` DECIMAL(5,2) NULL DEFAULT '0.00' ,
  `quantity` INT(11) UNSIGNED NULL DEFAULT '0' ,
  `tax_exempt` INT(1) UNSIGNED NULL DEFAULT NULL ,
  `date_out` DATETIME NULL DEFAULT NULL ,
  `date_due` DATETIME NULL DEFAULT NULL ,
  `date_returned` DATETIME NULL DEFAULT NULL ,
  `days_charged` DECIMAL(4,2) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`, `invoice_id`, `inventory_id`) ,
  UNIQUE INDEX `invoice_item_id_UNIQUE` (`id` ASC) ,
  INDEX `fk_invoice_items_invoices1_idx` (`invoice_id` ASC) ,
  INDEX `fk_invoice_items_inventory1_idx` (`inventory_id` ASC) ,
  CONSTRAINT `fk_invoice_items_inventory1`
    FOREIGN KEY (`inventory_id` )
    REFERENCES `mgdb_dev`.`inventory` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_invoice_items_invoices1`
    FOREIGN KEY (`invoice_id` )
    REFERENCES `mgdb_dev`.`invoices` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mgdb_dev`.`invoice_items_pieces`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mgdb_dev`.`invoice_items_pieces` (
  `id` INT(11) UNSIGNED NOT NULL ,
  `invoice_items_id` INT(11) UNSIGNED NOT NULL ,
  `inventory_pieces_id` INT(11) UNSIGNED NOT NULL ,
  PRIMARY KEY (`id`, `invoice_items_id`, `inventory_pieces_id`) ,
  INDEX `fk_invoice_items_pieces_invoice_items1_idx` (`invoice_items_id` ASC) ,
  INDEX `fk_invoice_items_pieces_inventory_pieces1_idx` (`inventory_pieces_id` ASC) ,
  CONSTRAINT `fk_invoice_items_pieces_inventory_pieces1`
    FOREIGN KEY (`inventory_pieces_id` )
    REFERENCES `mgdb_dev`.`inventory_pieces` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_invoice_items_pieces_invoice_items1`
    FOREIGN KEY (`invoice_items_id` )
    REFERENCES `mgdb_dev`.`invoice_items` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mgdb_dev`.`oauth_clients`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mgdb_dev`.`oauth_clients` (
  `id` VARCHAR(40) NOT NULL DEFAULT '' ,
  `secret` VARCHAR(40) NOT NULL DEFAULT '' ,
  `name` VARCHAR(255) NOT NULL DEFAULT '' ,
  `auto_approve` TINYINT(1) NOT NULL DEFAULT '0' ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mgdb_dev`.`oauth_client_endpoints`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mgdb_dev`.`oauth_client_endpoints` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `client_id` VARCHAR(40) NOT NULL DEFAULT '' ,
  `redirect_uri` VARCHAR(255) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `client_id` (`client_id` ASC) ,
  CONSTRAINT `oauth_client_endpoints_ibfk_1`
    FOREIGN KEY (`client_id` )
    REFERENCES `mgdb_dev`.`oauth_clients` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mgdb_dev`.`oauth_scopes`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mgdb_dev`.`oauth_scopes` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `scope` VARCHAR(255) NOT NULL DEFAULT '' ,
  `name` VARCHAR(255) NOT NULL DEFAULT '' ,
  `description` VARCHAR(255) NULL DEFAULT '' ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `scope` (`scope` ASC) )
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mgdb_dev`.`oauth_sessions`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mgdb_dev`.`oauth_sessions` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `client_id` VARCHAR(40) NOT NULL DEFAULT '' ,
  `redirect_uri` VARCHAR(250) NULL DEFAULT '' ,
  `owner_type` VARCHAR(10) NOT NULL DEFAULT 'user' ,
  `owner_id` VARCHAR(255) NULL DEFAULT '' ,
  `access_token` VARCHAR(40) NULL DEFAULT '' ,
  `auth_code` VARCHAR(40) NULL DEFAULT '' ,
  `refresh_token` VARCHAR(40) NULL DEFAULT '' ,
  `access_token_expires` INT(10) NULL DEFAULT NULL ,
  `stage` VARCHAR(15) NOT NULL DEFAULT 'requested' ,
  `first_requested` INT(10) UNSIGNED NOT NULL ,
  `last_updated` INT(10) UNSIGNED NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `client_id` (`client_id` ASC) )
ENGINE = InnoDB
AUTO_INCREMENT = 45
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mgdb_dev`.`oauth_session_scopes`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mgdb_dev`.`oauth_session_scopes` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `session_id` INT(11) UNSIGNED NOT NULL ,
  `scope_id` INT(11) UNSIGNED NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `session_id` (`session_id` ASC) ,
  INDEX `scope_id` (`scope_id` ASC) ,
  CONSTRAINT `oauth_session_scopes_ibfk_4`
    FOREIGN KEY (`session_id` )
    REFERENCES `mgdb_dev`.`oauth_sessions` (`id` )
    ON DELETE CASCADE,
  CONSTRAINT `oauth_session_scopes_ibfk_5`
    FOREIGN KEY (`scope_id` )
    REFERENCES `mgdb_dev`.`oauth_scopes` (`id` )
    ON DELETE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 26
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mgdb_dev`.`order_status`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mgdb_dev`.`order_status` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `title` VARCHAR(50) NOT NULL ,
  `complete` INT(1) UNSIGNED NOT NULL DEFAULT '0' ,
  `disabled` INT(1) UNSIGNED NOT NULL DEFAULT '0' ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `title_UNIQUE` (`title` ASC) ,
  UNIQUE INDEX `order_status_id_UNIQUE` (`id` ASC) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mgdb_dev`.`order_submit_methods`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mgdb_dev`.`order_submit_methods` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `title` VARCHAR(50) NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `title_UNIQUE` (`title` ASC) ,
  UNIQUE INDEX `order_submit_method_id_UNIQUE` (`id` ASC) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mgdb_dev`.`orders`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mgdb_dev`.`orders` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `vendor_id` INT(11) UNSIGNED NOT NULL ,
  `clerk_id` INT(11) UNSIGNED NOT NULL ,
  `order_status_id` INT(11) UNSIGNED NOT NULL ,
  `order_date` DATETIME NULL DEFAULT NULL ,
  `last_update_date` DATETIME NULL DEFAULT NULL ,
  `order_key` VARCHAR(180) NULL DEFAULT NULL ,
  `cancel_date` DATETIME NULL DEFAULT NULL ,
  `ship_date` DATETIME NULL DEFAULT NULL ,
  `order_discount` VARCHAR(50) NULL DEFAULT NULL ,
  `payment_terms` VARCHAR(50) NULL DEFAULT NULL ,
  `delivery_date` DATETIME NULL DEFAULT NULL ,
  `submit_date` DATETIME NULL DEFAULT NULL ,
  `order_submit_method_id` INT(11) UNSIGNED NOT NULL ,
  PRIMARY KEY (`id`, `vendor_id`, `clerk_id`, `order_status_id`) ,
  UNIQUE INDEX `order_id_UNIQUE` (`id` ASC) ,
  INDEX `fk_orders_order_status_idx` (`order_status_id` ASC) ,
  INDEX `fk_orders_order_submit_methods1_idx` (`order_submit_method_id` ASC) ,
  INDEX `fk_orders_vendors1_idx` (`vendor_id` ASC) ,
  INDEX `fk_orders_clerks1_idx` (`clerk_id` ASC) ,
  CONSTRAINT `fk_orders_clerks1`
    FOREIGN KEY (`clerk_id` )
    REFERENCES `mgdb_dev`.`clerks` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_orders_order_status`
    FOREIGN KEY (`order_status_id` )
    REFERENCES `mgdb_dev`.`order_status` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_orders_order_submit_methods1`
    FOREIGN KEY (`order_submit_method_id` )
    REFERENCES `mgdb_dev`.`order_submit_methods` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_orders_vendors1`
    FOREIGN KEY (`vendor_id` )
    REFERENCES `mgdb_dev`.`vendors` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mgdb_dev`.`order_items`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mgdb_dev`.`order_items` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `order_id` INT(11) UNSIGNED NOT NULL ,
  `inventory_id` INT(11) UNSIGNED NOT NULL ,
  `quantity_ordered` INT(5) NOT NULL DEFAULT '0' ,
  `quantity_received` INT(5) NULL DEFAULT NULL ,
  `current_cost` DECIMAL(5,2) NOT NULL ,
  `price` DECIMAL(5,2) NOT NULL ,
  PRIMARY KEY (`id`, `order_id`, `inventory_id`) ,
  UNIQUE INDEX `order_item_id_UNIQUE` (`id` ASC) ,
  INDEX `fk_order_items_orders1_idx` (`order_id` ASC) ,
  INDEX `fk_order_items_inventory1_idx` (`inventory_id` ASC) ,
  CONSTRAINT `fk_order_items_inventory1`
    FOREIGN KEY (`inventory_id` )
    REFERENCES `mgdb_dev`.`inventory` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_order_items_orders1`
    FOREIGN KEY (`order_id` )
    REFERENCES `mgdb_dev`.`orders` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

USE `mgdb_dev` ;
USE `mgdb_dev`;

DELIMITER $$
USE `mgdb_dev`$$
CREATE
DEFINER=`root`@`localhost`
TRIGGER `mgdb_dev`.`inventory_BINS`
BEFORE INSERT ON `mgdb_dev`.`inventory`
FOR EACH ROW
-- Edit trigger body code below this line. Do not edit lines above this one
set NEW.short_description = substring(NEW.description, 1, 200)$$

USE `mgdb_dev`$$
CREATE
DEFINER=`root`@`localhost`
TRIGGER `mgdb_dev`.`inventory_BUPD`
BEFORE UPDATE ON `mgdb_dev`.`inventory`
FOR EACH ROW
-- Edit trigger body code below this line. Do not edit lines above this one
set NEW.short_description = substring(NEW.description, 1, 200)$$


DELIMITER ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
