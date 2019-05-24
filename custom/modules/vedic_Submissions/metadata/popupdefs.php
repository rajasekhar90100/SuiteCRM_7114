<?php
$popupMeta = array (
    'moduleMain' => 'vedic_Submissions',
    'varName' => 'vedic_Submissions',
    'orderBy' => 'vedic_submissions.name',
    'whereClauses' => array (
  'vedic_candidates_vedic_submissions_1_name' => 'vedic_submissions.vedic_candidates_vedic_submissions_1_name',
  'vedic_job_vedic_submissions_1_name' => 'vedic_submissions.vedic_job_vedic_submissions_1_name',
  'status' => 'vedic_submissions.status',
  'document_name' => 'vedic_submissions.document_name',
  'job_poster_email_c' => 'vedic_submissions_cstm.job_poster_email_c',
  'assigned_user_name' => 'vedic_submissions.assigned_user_name',
),
    'searchInputs' => array (
  3 => 'status',
  4 => 'vedic_candidates_vedic_submissions_1_name',
  5 => 'vedic_job_vedic_submissions_1_name',
  6 => 'document_name',
  7 => 'job_poster_email_c',
  8 => 'assigned_user_name',
),
    'searchdefs' => array (
  'vedic_candidates_vedic_submissions_1_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_VEDIC_CANDIDATES_VEDIC_SUBMISSIONS_1_FROM_VEDIC_CANDIDATES_TITLE',
    'width' => '10%',
    'id' => 'VEDIC_CANDIDATES_VEDIC_SUBMISSIONS_1VEDIC_CANDIDATES_IDA',
    'name' => 'vedic_candidates_vedic_submissions_1_name',
  ),
  'vedic_job_vedic_submissions_1_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_VEDIC_JOB_VEDIC_SUBMISSIONS_1_FROM_VEDIC_JOB_TITLE',
    'width' => '10%',
    'id' => 'VEDIC_JOB_VEDIC_SUBMISSIONS_1VEDIC_JOB_IDA',
    'name' => 'vedic_job_vedic_submissions_1_name',
  ),
  'status' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_STATUS',
    'width' => '10%',
    'name' => 'status',
  ),
  'document_name' => 
  array (
    'name' => 'document_name',
    'width' => '10%',
  ),
  'job_poster_email_c' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_JOB_POSTER_EMAIL',
    'width' => '10%',
    'name' => 'job_poster_email_c',
  ),
  'assigned_user_name' => 
  array (
    'link' => true,
    'type' => 'relate',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'id' => 'ASSIGNED_USER_ID',
    'width' => '10%',
    'name' => 'assigned_user_name',
  ),
),
);
