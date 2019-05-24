<?php
// created: 2018-05-30 12:09:30
$dictionary["vedic_Candidates"]["fields"]["vedic_job_vedic_candidates_1"] = array (
  'name' => 'vedic_job_vedic_candidates_1',
  'type' => 'link',
  'relationship' => 'vedic_job_vedic_candidates_1',
  'source' => 'non-db',
  'module' => 'vedic_job',
  'bean_name' => 'vedic_job',
  'vname' => 'LBL_VEDIC_JOB_VEDIC_CANDIDATES_1_FROM_VEDIC_JOB_TITLE',
  'id_name' => 'vedic_job_vedic_candidates_1vedic_job_ida',
);
$dictionary["vedic_Candidates"]["fields"]["vedic_job_vedic_candidates_1_name"] = array (
  'name' => 'vedic_job_vedic_candidates_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_VEDIC_JOB_VEDIC_CANDIDATES_1_FROM_VEDIC_JOB_TITLE',
  'save' => true,
  'id_name' => 'vedic_job_vedic_candidates_1vedic_job_ida',
  'link' => 'vedic_job_vedic_candidates_1',
  'table' => 'vedic_job',
  'module' => 'vedic_job',
  'rname' => 'name',
);
$dictionary["vedic_Candidates"]["fields"]["vedic_job_vedic_candidates_1vedic_job_ida"] = array (
  'name' => 'vedic_job_vedic_candidates_1vedic_job_ida',
  'type' => 'link',
  'relationship' => 'vedic_job_vedic_candidates_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_VEDIC_JOB_VEDIC_CANDIDATES_1_FROM_VEDIC_CANDIDATES_TITLE',
);
