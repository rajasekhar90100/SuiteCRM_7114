<?php
// created: 2015-01-06 05:44:17
$dictionary["vedic_Submissions"]["fields"]["vedic_job_vedic_submissions_1"] = array (
  'name' => 'vedic_job_vedic_submissions_1',
  'type' => 'link',
  'relationship' => 'vedic_job_vedic_submissions_1',
  'source' => 'non-db',
  'module' => 'vedic_job',
  'bean_name' => 'vedic_job',
  'vname' => 'LBL_VEDIC_JOB_VEDIC_SUBMISSIONS_1_FROM_VEDIC_JOB_TITLE',
  'id_name' => 'vedic_job_vedic_submissions_1vedic_job_ida',
);
$dictionary["vedic_Submissions"]["fields"]["vedic_job_vedic_submissions_1_name"] = array (
  'name' => 'vedic_job_vedic_submissions_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_VEDIC_JOB_VEDIC_SUBMISSIONS_1_FROM_VEDIC_JOB_TITLE',
  'save' => true,
  'id_name' => 'vedic_job_vedic_submissions_1vedic_job_ida',
  'link' => 'vedic_job_vedic_submissions_1',
  'table' => 'vedic_job',
  'module' => 'vedic_job',
  'rname' => 'name',
);
$dictionary["vedic_Submissions"]["fields"]["vedic_job_vedic_submissions_1vedic_job_ida"] = array (
  'name' => 'vedic_job_vedic_submissions_1vedic_job_ida',
  'type' => 'link',
  'relationship' => 'vedic_job_vedic_submissions_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_VEDIC_JOB_VEDIC_SUBMISSIONS_1_FROM_VEDIC_SUBMISSIONS_TITLE',
);
