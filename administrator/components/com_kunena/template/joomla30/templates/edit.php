<?php
/**
 * Kunena Component
 * @package Kunena.Administrator.Template.Joomla30
 * @subpackage Templates
 *
 * @copyright (C) 2008 - 2013 Kunena Team. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @link http://www.kunena.org
 **/
defined ( '_JEXEC' ) or die ();

JHtml::_('behavior.tooltip');
JHtml::_('behavior.multiselect');
JHtml::_('dropdown.init');
JHtml::_('formbehavior.chosen', 'select');
?>
<div id="j-sidebar-container" class="span2">
	<div id="sidebar">
		<div class="sidebar-nav"><?php include KPATH_ADMIN.'/template/joomla30/common/menu.php'; ?></div>
	</div>
</div>

<div id="j-main-container" class="span10">
	<form action="<?php echo KunenaRoute::_('administrator/index.php?option=com_kunena&view=templates'); ?>" method="post" id="adminForm" name="adminForm">
		<input type="hidden" name="task" value="" />
		<input type="hidden" name="templatename" value="<?php echo $this->escape($this->templatename); ?>">
		<?php echo JHtml::_( 'form.token' ); ?>

		<div class="row-fluid">
			<fieldset class="span4">
				<legend><?php echo JText::_( 'COM_KUNENA_A_TEMPLATE_MANAGER_DETAILS' ); ?></legend>
				<table class="table table-bordered table-striped">
					<tr>
						<td colspan="2"><h1><?php echo JText::_($this->details->name); ?></h1></td>
					</tr>
					<tr>
						<td><?php echo JText::_( 'COM_KUNENA_A_TEMPLATE_MANAGER_AUTHOR' ); ?>:</td>
						<td><strong><?php echo JText::_($this->details->author); ?></strong></td>
					</tr>
					<tr>
						<td><?php echo JText::_( 'COM_KUNENA_A_TEMPLATE_MANAGER_DESCRIPTION' ); ?>:</td>
						<td><?php $path = KPATH_SITE.'/template/'.$this->templatename. '/images/template_thumbnail.png';
							if (file_exists($path)) : ?>
							<div><img src ="<?php echo JUri::root(true); ?>/components/com_kunena/template/<?php echo $this->escape($this->templatename); ?>/images/template_thumbnail.png" alt="" /></div>
							<?php endif; ?>
							<div><?php echo JText::_($this->details->description); ?></div>
						</td>
					</tr>
				</table>
			</fieldset>

			<fieldset class="span8">
				<legend><?php echo JText::_( 'COM_KUNENA_A_TEMPLATE_MANAGER_PARAMETERS' ); ?></legend>
				<table class="table table-bordered table-striped">
					<tr>
						<td colspan="2">
							<?php
								$templatefile = KPATH_SITE.'/template/'.$this->templatename.'/params.ini';
								echo is_writable($templatefile) ? JText::sprintf('COM_KUNENA_A_TEMPLATE_MANAGER_PARAMSWRITABLE', $this->escape($templatefile)):JText::sprintf('COM_KUNENA_A_TEMPLATE_MANAGER_PARAMSUNWRITABLE', $this->escape($templatefile));
							?>
						</td>
					</tr>
					<tr>
						<td>
							<?php if ($this->form instanceof JForm) : ?>
							<table class="table table-bordered table-striped">
								<?php foreach ($this->params->toArray() as $item) : ?>
								<tr>
									<?php if ($item[0]) : ?>
									<td width="40%" class="paramlist_key">
										<?php echo $item[0]; ?>
									</td>
									<td class="paramlist_value">
										<?php echo $item[1]; ?>
									</td>
									<?php else : ?>
									<td class="paramlist_value" colspan="2">
										<?php echo $item[1]; ?>
									</td>
									<?php endif; ?>
								</tr>
								<?php endforeach; ?>
							</table>
							<?php
								else :
									echo '<em>' . JText :: _('COM_KUNENA_A_TEMPLATE_MANAGER_NO_PARAMETERS') . '</em>';
								endif;
							?>
						</td>
					</tr>
				</table>
			</fieldset>
		</div>
	</form>
</div>

<div class="pull-right small">
	<?php echo KunenaVersion::getLongVersionHTML(); ?>
</div>